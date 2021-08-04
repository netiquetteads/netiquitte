<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMailHistoryRequest;
use App\Http\Requests\UpdateMailHistoryRequest;
use App\Http\Resources\Admin\MailHistoryResource;
use App\Models\MailHistory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MailHistoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mail_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MailHistoryResource(MailHistory::with(['posted_campaign'])->get());
    }

    public function store(StoreMailHistoryRequest $request)
    {
        $mailHistory = MailHistory::create($request->all());

        return (new MailHistoryResource($mailHistory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MailHistory $mailHistory)
    {
        abort_if(Gate::denies('mail_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MailHistoryResource($mailHistory->load(['posted_campaign']));
    }

    public function update(UpdateMailHistoryRequest $request, MailHistory $mailHistory)
    {
        $mailHistory->update($request->all());

        return (new MailHistoryResource($mailHistory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MailHistory $mailHistory)
    {
        abort_if(Gate::denies('mail_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mailHistory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
