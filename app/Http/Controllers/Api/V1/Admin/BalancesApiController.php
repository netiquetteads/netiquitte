<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBalanceRequest;
use App\Http\Requests\UpdateBalanceRequest;
use App\Http\Resources\Admin\BalanceResource;
use App\Models\Balance;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BalancesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('balance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BalanceResource(Balance::with(['payment_method', 'payment_status'])->get());
    }

    public function store(StoreBalanceRequest $request)
    {
        $balance = Balance::create($request->all());

        return (new BalanceResource($balance))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Balance $balance)
    {
        abort_if(Gate::denies('balance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BalanceResource($balance->load(['payment_method', 'payment_status']));
    }

    public function update(UpdateBalanceRequest $request, Balance $balance)
    {
        $balance->update($request->all());

        return (new BalanceResource($balance))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Balance $balance)
    {
        abort_if(Gate::denies('balance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $balance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
