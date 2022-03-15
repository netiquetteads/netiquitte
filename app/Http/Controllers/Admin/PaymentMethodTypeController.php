<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethodType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PaymentMethodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('payment_method_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PaymentMethodType::select(sprintf('%s.*', (new PaymentMethodType())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'payment_method_type_show';
                $editGate = 'payment_method_type_edit';
                $deleteGate = 'payment_method_type_delete';
                $crudRoutePart = 'payment-method-type';

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

        return view('admin.paymentMethodTypes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('payment_method_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentMethodTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paymentMethodType = PaymentMethodType::create($request->all());

        return redirect()->route('admin.payment-method-type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethodType $paymentMethodType)
    {
        abort_if(Gate::denies('payment_method_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentMethodTypes.show', compact('paymentMethodType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PaymentMethodType $paymentMethodType)
    {
        abort_if(Gate::denies('payment_method_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentMethodTypes.edit', compact('paymentMethodType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethodType $paymentMethodType)
    {
        $paymentMethodType->update($request->all());

        return redirect()->route('admin.payment-method-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethodType $paymentMethodType)
    {
        abort_if(Gate::denies('payment_method_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentMethodType->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        PaymentMethodType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function createNewMethod(Request $request)
    {
        PaymentMethodType::create($request->all());

        $paymentMethodTypes = PaymentMethodType::get();

        $html = '<option value="">Select</option>';

        foreach ($paymentMethodTypes as $key => $paymentMethodType) {
            $html .= ' <option value="'.$paymentMethodType->id.'">'.$paymentMethodType->name.'</option>';
        }

        echo $html;
    }

    public function getPaymentFields(Request $request)
    {
        $paymentMethodType = PaymentMethodType::where('id', $request->id)->first();

        $html = view('admin.balances.partials.fields.add_fields', compact('paymentMethodType'))->render();

        echo $html;
    }
}
