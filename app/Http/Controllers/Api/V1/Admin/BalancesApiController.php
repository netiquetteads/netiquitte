<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBalanceRequest;
use App\Http\Requests\UpdateBalanceRequest;
use App\Http\Resources\Admin\BalanceResource;
use App\Models\Balance;
use DB;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class BalancesApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('balance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        //abort_if(Gate::denies('balance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        //abort_if(Gate::denies('balance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $balance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getChartData()
    {
        $lastYearProfit = Balance::select(
            DB::raw('SUM(profit) as profit'),
            DB::raw('SUM(revenue) as revenue'),
            DB::raw('SUM(payout) as payout'),
            DB::raw('accounting_month'),
            DB::raw("CAST(date_format(str_to_date(accounting_month,'%M'),'%c') as SIGNED integer) as month"),
            DB::raw('CAST(accounting_year as SIGNED integer) as year'),
        )
        // ->whereBetween('accounting_year', [date("Y",strtotime("-1 year")), date("Y")])
        ->where('accounting_year', date('Y', strtotime('-1 year')))
        ->groupBy('accounting_month', 'accounting_year')
        ->orderBy('month', 'ASC')
        ->orderBy('year', 'ASC')
        ->get();

        $currentYearProfit = Balance::select(
            DB::raw('SUM(profit) as profit'),
            DB::raw('SUM(revenue) as revenue'),
            DB::raw('SUM(payout) as payout'),
            DB::raw('accounting_month'),
            DB::raw("CAST(date_format(str_to_date(accounting_month,'%M'),'%c') as SIGNED integer) as month"),
            DB::raw('CAST(accounting_year as SIGNED integer) as year'),
            )
            // ->whereBetween('accounting_year', [date("Y",strtotime("-1 year")), date("Y")])
            ->where('accounting_year', date('Y'))
            ->groupBy('accounting_month', 'accounting_year')
            ->orderBy('month', 'ASC')
            ->orderBy('year', 'ASC')
            ->get();

        $data = [
            date('Y', strtotime('-1 year')) => [
                'profit'=>$lastYearProfit->pluck('profit'),
                'revenue'=>$lastYearProfit->pluck('revenue'),
                'payout'=>$lastYearProfit->pluck('payout'),
            ],
            date('Y') => [
                'profit'=>$currentYearProfit->pluck('profit'),
                'revenue'=>$currentYearProfit->pluck('revenue'),
                'payout'=>$currentYearProfit->pluck('payout'),
            ],
        ];

        return $data;
    }
}
