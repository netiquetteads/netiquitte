<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PaymentMethodTypeResource;
use App\Models\PaymentMethodType;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentMethodTypeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PaymentMethodTypeResource(PaymentMethodType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $PaymentMethodType = PaymentMethodType::create($request->all());

        return (new PaymentMethodTypeResource($PaymentMethodType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethodType $PaymentMethodType)
    {
        return new PaymentMethodTypeResource($PaymentMethodType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethodType $PaymentMethodType)
    {
        $PaymentMethodType->update($request->all());

        return (new PaymentMethodTypeResource($PaymentMethodType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethodType $PaymentMethodType)
    {
        $PaymentMethodType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
