<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Resources\Admin\AccountResource;
use App\Models\Account;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountResource(Account::with(['users', 'team'])->get());
    }

    public function store(StoreAccountRequest $request)
    {
        $account = Account::create($request->all());
        $account->users()->sync($request->input('users', []));

        return (new AccountResource($account))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Account $account)
    {
        abort_if(Gate::denies('account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountResource($account->load(['users', 'team']));
    }

    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->all());
        $account->users()->sync($request->input('users', []));

        return (new AccountResource($account))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Account $account)
    {
        abort_if(Gate::denies('account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
