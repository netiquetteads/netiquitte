<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOpenedMailRequest;
use App\Http\Requests\UpdateOpenedMailRequest;
use App\Http\Resources\Admin\OpenedMailResource;
use App\Models\OpenedMail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OpenedMailApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('opened_mail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OpenedMailResource(OpenedMail::with(['campaige'])->get());
    }

    public function store(StoreOpenedMailRequest $request)
    {
        $openedMail = OpenedMail::create($request->all());

        return (new OpenedMailResource($openedMail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OpenedMail $openedMail)
    {
        abort_if(Gate::denies('opened_mail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OpenedMailResource($openedMail->load(['campaige']));
    }

    public function update(UpdateOpenedMailRequest $request, OpenedMail $openedMail)
    {
        $openedMail->update($request->all());

        return (new OpenedMailResource($openedMail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OpenedMail $openedMail)
    {
        abort_if(Gate::denies('opened_mail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $openedMail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
