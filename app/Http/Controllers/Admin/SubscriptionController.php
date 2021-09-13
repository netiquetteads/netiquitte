<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubscriptionRequest;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Offer;
use App\Models\Subscriber;
use App\Models\Subscription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('subscription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Subscription::with(['subscriber', 'offer_subscription'])->select(sprintf('%s.*', (new Subscription())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'subscription_show';
                $editGate = 'subscription_edit';
                $deleteGate = 'subscription_delete';
                $crudRoutePart = 'subscriptions';

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
            $table->addColumn('subscriber_email', function ($row) {
                return $row->subscriber ? $row->subscriber->email : '';
            });

            $table->addColumn('offer_subscription_name', function ($row) {
                return $row->offer_subscription ? $row->offer_subscription->name : '';
            });

            $table->editColumn('subscribed_time', function ($row) {
                return $row->subscribed_time ? $row->subscribed_time : '';
            });

            $table->editColumn('unsubscribed_time', function ($row) {
                return $row->unsubscribed_time ? $row->unsubscribed_time : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'subscriber', 'offer_subscription']);

            return $table->make(true);
        }

        return view('admin.subscriptions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('subscription_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscribers = Subscriber::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offer_subscriptions = Offer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subscriptions.create', compact('subscribers', 'offer_subscriptions'));
    }

    public function store(StoreSubscriptionRequest $request)
    {
        $subscription = Subscription::create($request->all());

        return redirect()->route('admin.subscriptions.index');
    }

    public function edit(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscribers = Subscriber::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offer_subscriptions = Offer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subscription->load('subscriber', 'offer_subscription');

        return view('admin.subscriptions.edit', compact('subscribers', 'offer_subscriptions', 'subscription'));
    }

    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        $subscription->update($request->all());

        return redirect()->route('admin.subscriptions.index');
    }

    public function show(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscription->load('subscriber', 'offer_subscription');

        return view('admin.subscriptions.show', compact('subscription'));
    }

    public function destroy(Subscription $subscription)
    {
        abort_if(Gate::denies('subscription_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subscription->delete();

        return back();
    }

    public function massDestroy(MassDestroySubscriptionRequest $request)
    {
        Subscription::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
