<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentMethodRequest;
use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Models\Affiliate;
use App\Models\PaymentMethod;
use App\Models\PaymentMethodType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('payment_method_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PaymentMethod::select(sprintf('%s.*', (new PaymentMethod())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'payment_method_show';
                $editGate = 'payment_method_edit';
                $deleteGate = 'payment_method_delete';
                $crudRoutePart = 'payment-methods';

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
                return $row->payment_method_type->name ? $row->payment_method_type->name : '';
            });
            $table->editColumn('affiliate', function ($row) {
                return $row->affiliate->name ? $row->affiliate->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id', 'name']);

            return $table->make(true);
        }

        return view('admin.paymentMethods.index');
    }

    public function create()
    {
        abort_if(Gate::denies('payment_method_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentMethodTypes = PaymentMethodType::get();
        $affiliates = Affiliate::get();

        return view('admin.paymentMethods.create', compact('paymentMethodTypes', 'affiliates'));
    }

    public function store(StorePaymentMethodRequest $request)
    {
        $paymentMethod = PaymentMethod::create($request->all());

        return redirect()->route('admin.payment-methods.index');
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        abort_if(Gate::denies('payment_method_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentMethodTypes = PaymentMethodType::get();
        $affiliates = Affiliate::get();

        return view('admin.paymentMethods.edit', compact('paymentMethod', 'paymentMethodTypes', 'affiliates'));
    }

    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->update($request->all());

        return redirect()->route('admin.payment-methods.index');
    }

    public function show(PaymentMethod $paymentMethod)
    {
        abort_if(Gate::denies('payment_method_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentMethods.show', compact('paymentMethod'));
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        abort_if(Gate::denies('payment_method_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentMethod->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentMethodRequest $request)
    {
        PaymentMethod::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getPaymentType(Request $request)
    {
        $data = PaymentMethodType::where('id', $request->id)->first();
        echo json_encode($data);
    }
}
