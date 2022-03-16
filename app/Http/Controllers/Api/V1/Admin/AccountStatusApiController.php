<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountStatusRequest;
use App\Http\Requests\UpdateAccountStatusRequest;
use App\Http\Resources\Admin\AccountStatusResource;
use App\Models\AccountStatus;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AccountStatusApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('account_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountStatusResource(AccountStatus::all());
    }

    public function store(StoreAccountStatusRequest $request)
    {
        $accountStatus = AccountStatus::create($request->all());

        return (new AccountStatusResource($accountStatus))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AccountStatus $accountStatus)
    {
        //abort_if(Gate::denies('account_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountStatusResource($accountStatus);
    }

    public function update(UpdateAccountStatusRequest $request, AccountStatus $accountStatus)
    {
        $accountStatus->update($request->all());

        return (new AccountStatusResource($accountStatus))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AccountStatus $accountStatus)
    {
        //abort_if(Gate::denies('account_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountStatus->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
