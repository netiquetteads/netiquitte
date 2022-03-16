<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Http\Resources\Admin\PaymentMethodResource;
use App\Models\Affiliate;
use App\Models\PaymentMethod;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PaymentMethodApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('payment_method_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentMethodResource(PaymentMethod::all());
    }

    public function store(StorePaymentMethodRequest $request)
    {
        $paymentMethod = PaymentMethod::create($request->all());

        $affiliate = Affiliate::where('id', $request->affiliate_id)->first();
        $affiliate->w8 = $request->w8;
        $affiliate->w9 = $request->w9;
        $affiliate->save();

        return (new PaymentMethodResource($paymentMethod))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PaymentMethod $paymentMethod)
    {
        //abort_if(Gate::denies('payment_method_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentMethodResource($paymentMethod);
    }

    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->update($request->all());

        $affiliate = Affiliate::where('id', $request->affiliate_id)->first();
        $affiliate->w8 = $request->w8;
        $affiliate->w9 = $request->w9;
        $affiliate->save();

        return (new PaymentMethodResource($paymentMethod))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        //abort_if(Gate::denies('payment_method_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentMethod->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
