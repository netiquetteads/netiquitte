<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBalanceRequest;
use App\Http\Requests\StoreBalanceRequest;
use App\Http\Requests\UpdateBalanceRequest;
use App\Models\Account;
use App\Models\Balance;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BalancesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('balance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Balance::with(['company_name', 'payment_status', 'payment_method', 'team'])->select(sprintf('%s.*', (new Balance())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'balance_show';
                $editGate = 'balance_edit';
                $deleteGate = 'balance_delete';
                $crudRoutePart = 'balances';

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
            $table->addColumn('company_name_company', function ($row) {
                return $row->company_name ? $row->company_name->company : '';
            });

            $table->editColumn('revenue', function ($row) {
                return $row->revenue ? $row->revenue : '';
            });
            $table->editColumn('payout', function ($row) {
                return $row->payout ? $row->payout : '';
            });
            $table->editColumn('profit', function ($row) {
                return $row->profit ? $row->profit : '';
            });
            $table->addColumn('payment_status_name', function ($row) {
                return $row->payment_status ? $row->payment_status->name : '';
            });

            $table->addColumn('payment_method_name', function ($row) {
                return $row->payment_method ? $row->payment_method->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'company_name', 'payment_status', 'payment_method']);

            return $table->make(true);
        }

        return view('admin.balances.index');
    }

    public function create()
    {
        abort_if(Gate::denies('balance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company_names = Account::all()->pluck('company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_statuses = PaymentStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_methods = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.balances.create', compact('company_names', 'payment_statuses', 'payment_methods'));
    }

    public function store(StoreBalanceRequest $request)
    {
        $balance = Balance::create($request->all());

        return redirect()->route('admin.balances.index');
    }

    public function edit(Balance $balance)
    {
        abort_if(Gate::denies('balance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company_names = Account::all()->pluck('company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_statuses = PaymentStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_methods = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $balance->load('company_name', 'payment_status', 'payment_method', 'team');

        return view('admin.balances.edit', compact('company_names', 'payment_statuses', 'payment_methods', 'balance'));
    }

    public function update(UpdateBalanceRequest $request, Balance $balance)
    {
        $balance->update($request->all());

        return redirect()->route('admin.balances.index');
    }

    public function show(Balance $balance)
    {
        abort_if(Gate::denies('balance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $balance->load('company_name', 'payment_status', 'payment_method', 'team');

        return view('admin.balances.show', compact('balance'));
    }

    public function destroy(Balance $balance)
    {
        abort_if(Gate::denies('balance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $balance->delete();

        return back();
    }

    public function massDestroy(MassDestroyBalanceRequest $request)
    {
        Balance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}