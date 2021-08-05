<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyResultsTrackingRequest;
use App\Http\Requests\StoreResultsTrackingRequest;
use App\Http\Requests\UpdateResultsTrackingRequest;
use App\Models\Campaign;
use App\Models\ResultsTracking;
use App\Models\Subscriber;
use App\Models\Subscription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ResultsTrackingController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('results_tracking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ResultsTracking::with(['campaign', 'subscriber', 'subscription'])->select(sprintf('%s.*', (new ResultsTracking())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'results_tracking_show';
                $editGate = 'results_tracking_edit';
                $deleteGate = 'results_tracking_delete';
                $crudRoutePart = 'results-trackings';

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
            $table->addColumn('campaign_name', function ($row) {
                return $row->campaign ? $row->campaign->name : '';
            });

            $table->editColumn('campaign.email_subject', function ($row) {
                return $row->campaign ? (is_string($row->campaign) ? $row->campaign : $row->campaign->email_subject) : '';
            });
            $table->addColumn('subscriber_email', function ($row) {
                return $row->subscriber ? $row->subscriber->email : '';
            });

            $table->addColumn('subscription_subscribed_date', function ($row) {
                return $row->subscription ? $row->subscription->subscribed_date : '';
            });

            $table->editColumn('subscription.subscribed_time', function ($row) {
                return $row->subscription ? (is_string($row->subscription) ? $row->subscription : $row->subscription->subscribed_time) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'campaign', 'subscriber', 'subscription']);

            return $table->make(true);
        }

        return view('admin.resultsTrackings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('results_tracking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaigns = Campaign::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subscribers = Subscriber::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subscriptions = Subscription::pluck('subscribed_date', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.resultsTrackings.create', compact('campaigns', 'subscribers', 'subscriptions'));
    }

    public function store(StoreResultsTrackingRequest $request)
    {
        $resultsTracking = ResultsTracking::create($request->all());

        return redirect()->route('admin.results-trackings.index');
    }

    public function edit(ResultsTracking $resultsTracking)
    {
        abort_if(Gate::denies('results_tracking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaigns = Campaign::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subscribers = Subscriber::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subscriptions = Subscription::pluck('subscribed_date', 'id')->prepend(trans('global.pleaseSelect'), '');

        $resultsTracking->load('campaign', 'subscriber', 'subscription');

        return view('admin.resultsTrackings.edit', compact('campaigns', 'subscribers', 'subscriptions', 'resultsTracking'));
    }

    public function update(UpdateResultsTrackingRequest $request, ResultsTracking $resultsTracking)
    {
        $resultsTracking->update($request->all());

        return redirect()->route('admin.results-trackings.index');
    }

    public function show(ResultsTracking $resultsTracking)
    {
        abort_if(Gate::denies('results_tracking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resultsTracking->load('campaign', 'subscriber', 'subscription');

        return view('admin.resultsTrackings.show', compact('resultsTracking'));
    }

    public function destroy(ResultsTracking $resultsTracking)
    {
        abort_if(Gate::denies('results_tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resultsTracking->delete();

        return back();
    }

    public function massDestroy(MassDestroyResultsTrackingRequest $request)
    {
        ResultsTracking::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
