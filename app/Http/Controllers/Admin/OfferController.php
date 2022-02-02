<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOfferRequest;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Affiliate;
use App\Models\Offer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OfferController extends Controller
{
    public function index(Request $request, $status = '')
    {
        abort_if(Gate::denies('offer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            if ($status) {
                $query = Offer::with(['affiliate'])->select(sprintf('%s.*', (new Offer())->table))->where('offer_status', $status);
            } else {
                $query = Offer::with(['affiliate'])->select(sprintf('%s.*', (new Offer())->table));
            }
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'offer_show';
                $editGate = 'offer_edit';
                $deleteGate = 'offer_delete';
                $crudRoutePart = 'offers';

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
            $table->editColumn('source', function ($row) {
                return $row->source ? $row->source : '';
            });
            $table->editColumn('payout', function ($row) {
                return $row->payout ? $row->payout : '';
            });
            $table->editColumn('revenue', function ($row) {
                return $row->revenue ? $row->revenue : '';
            });
            $table->editColumn('offer_status', function ($row) {
                return $row->offer_status ? $row->offer_status : '';
            });
            $table->editColumn('margin', function ($row) {
                return $row->margin ? $row->margin : '';
            });
            $table->addColumn('affiliate_name', function ($row) {
                return $row->affiliate ? $row->affiliate->name : '';
            });

            $table->editColumn('today_clicks', function ($row) {
                return $row->today_clicks ? $row->today_clicks : '';
            });
            $table->editColumn('payout_amount', function ($row) {
                return $row->payout_amount ? $row->payout_amount : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'affiliate']);

            return $table->make(true);
        }

        return view('admin.offers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('offer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliates = Affiliate::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.offers.create', compact('affiliates'));
    }

    public function store(StoreOfferRequest $request)
    {
        $offer = Offer::create($request->all());

        return redirect()->route('admin.offers.index');
    }

    public function edit(Offer $offer)
    {
        abort_if(Gate::denies('offer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliates = Affiliate::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offer->load('affiliate');

        return view('admin.offers.edit', compact('affiliates', 'offer'));
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $offer->update($request->all());

        return redirect()->route('admin.offers.index');
    }

    public function show(Offer $offer)
    {
        abort_if(Gate::denies('offer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offer->load('affiliate');

        return view('admin.offers.show', compact('offer'));
    }

    public function destroy(Offer $offer)
    {
        abort_if(Gate::denies('offer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offer->delete();

        return back();
    }

    public function massDestroy(MassDestroyOfferRequest $request)
    {
        Offer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
