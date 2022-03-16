<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentStatusRequest;
use App\Http\Requests\StorePaymentStatusRequest;
use App\Http\Requests\UpdatePaymentStatusRequest;
use App\Models\PaymentStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PaymentStatusController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('payment_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PaymentStatus::select(sprintf('%s.*', (new PaymentStatus())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'payment_status_show';
                $editGate = 'payment_status_edit';
                $deleteGate = 'payment_status_delete';
                $crudRoutePart = 'payment-statuses';

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

            $table->rawColumns(['actions', 'placeholder', 'id', 'name']);

            return $table->make(true);
        }

        return view('admin.paymentStatuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('payment_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentStatuses.create');
    }

    public function store(StorePaymentStatusRequest $request)
    {
        $paymentStatus = PaymentStatus::create($request->all());

        return redirect()->route('admin.payment-statuses.index');
    }

    public function edit(PaymentStatus $paymentStatus)
    {
        abort_if(Gate::denies('payment_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentStatuses.edit', compact('paymentStatus'));
    }

    public function update(UpdatePaymentStatusRequest $request, PaymentStatus $paymentStatus)
    {
        $paymentStatus->update($request->all());

        return redirect()->route('admin.payment-statuses.index');
    }

    public function show(PaymentStatus $paymentStatus)
    {
        abort_if(Gate::denies('payment_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentStatuses.show', compact('paymentStatus'));
    }

    public function destroy(PaymentStatus $paymentStatus)
    {
        abort_if(Gate::denies('payment_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentStatusRequest $request)
    {
        PaymentStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
