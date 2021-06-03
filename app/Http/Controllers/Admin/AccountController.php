<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAccountRequest;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Account::with(['users', 'team'])->select(sprintf('%s.*', (new Account())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'account_show';
                $editGate = 'account_edit';
                $deleteGate = 'account_delete';
                $crudRoutePart = 'accounts';

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
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });
            $table->editColumn('company', function ($row) {
                return $row->company ? $row->company : '';
            });
            $table->editColumn('account_status', function ($row) {
                return $row->account_status ? Account::ACCOUNT_STATUS_SELECT[$row->account_status] : '';
            });
            $table->editColumn('users', function ($row) {
                $labels = [];
                foreach ($row->users as $user) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $user->name);
                }

                return implode(' ', $labels);
            });

            $table->editColumn('everflow_account', function ($row) {
                return $row->everflow_account ? $row->everflow_account : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'published', 'users']);

            return $table->make(true);
        }

        return view('admin.accounts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');

        return view('admin.accounts.create', compact('users'));
    }

    public function store(StoreAccountRequest $request)
    {
        $account = Account::create($request->all());
        $account->users()->sync($request->input('users', []));

        return redirect()->route('admin.accounts.index');
    }

    public function edit(Account $account)
    {
        abort_if(Gate::denies('account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');

        $account->load('users', 'team');

        return view('admin.accounts.edit', compact('users', 'account'));
    }

    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->all());
        $account->users()->sync($request->input('users', []));

        return redirect()->route('admin.accounts.index');
    }

    public function show(Account $account)
    {
        abort_if(Gate::denies('account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->load('users', 'team');

        return view('admin.accounts.show', compact('account'));
    }

    public function destroy(Account $account)
    {
        abort_if(Gate::denies('account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $account->delete();

        return back();
    }

    public function massDestroy(MassDestroyAccountRequest $request)
    {
        Account::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
