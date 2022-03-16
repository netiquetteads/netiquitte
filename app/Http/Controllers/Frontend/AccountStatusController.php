<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAccountStatusRequest;
use App\Http\Requests\StoreAccountStatusRequest;
use App\Http\Requests\UpdateAccountStatusRequest;
use App\Models\AccountStatus;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AccountStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountStatuses = AccountStatus::all();

        return view('frontend.accountStatuses.index', compact('accountStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('account_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.accountStatuses.create');
    }

    public function store(StoreAccountStatusRequest $request)
    {
        $accountStatus = AccountStatus::create($request->all());

        return redirect()->route('frontend.account-statuses.index');
    }

    public function edit(AccountStatus $accountStatus)
    {
        abort_if(Gate::denies('account_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.accountStatuses.edit', compact('accountStatus'));
    }

    public function update(UpdateAccountStatusRequest $request, AccountStatus $accountStatus)
    {
        $accountStatus->update($request->all());

        return redirect()->route('frontend.account-statuses.index');
    }

    public function show(AccountStatus $accountStatus)
    {
        abort_if(Gate::denies('account_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.accountStatuses.show', compact('accountStatus'));
    }

    public function destroy(AccountStatus $accountStatus)
    {
        abort_if(Gate::denies('account_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyAccountStatusRequest $request)
    {
        AccountStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
