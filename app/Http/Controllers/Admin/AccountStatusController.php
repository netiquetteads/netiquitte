<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAccountStatusRequest;
use App\Http\Requests\StoreAccountStatusRequest;
use App\Http\Requests\UpdateAccountStatusRequest;
use App\Models\AccountStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AccountStatusController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('account_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AccountStatus::with(['team'])->select(sprintf('%s.*', (new AccountStatus())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'account_status_show';
                $editGate = 'account_status_edit';
                $deleteGate = 'account_status_delete';
                $crudRoutePart = 'account-statuses';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.accountStatuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('account_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.accountStatuses.create');
    }

    public function store(StoreAccountStatusRequest $request)
    {
        $accountStatus = AccountStatus::create($request->all());

        return redirect()->route('admin.account-statuses.index');
    }

    public function edit(AccountStatus $accountStatus)
    {
        abort_if(Gate::denies('account_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountStatus->load('team');

        return view('admin.accountStatuses.edit', compact('accountStatus'));
    }

    public function update(UpdateAccountStatusRequest $request, AccountStatus $accountStatus)
    {
        $accountStatus->update($request->all());

        return redirect()->route('admin.account-statuses.index');
    }

    public function show(AccountStatus $accountStatus)
    {
        abort_if(Gate::denies('account_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountStatus->load('team');

        return view('admin.accountStatuses.show', compact('accountStatus'));
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
