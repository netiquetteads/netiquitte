<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResultsTrackingRequest;
use App\Http\Requests\UpdateResultsTrackingRequest;
use App\Http\Resources\Admin\ResultsTrackingResource;
use App\Models\ResultsTracking;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ResultsTrackingApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('results_tracking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ResultsTrackingResource(ResultsTracking::with(['campaign', 'subscriber', 'subscription'])->get());
    }

    public function store(StoreResultsTrackingRequest $request)
    {
        $resultsTracking = ResultsTracking::create($request->all());

        return (new ResultsTrackingResource($resultsTracking))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ResultsTracking $resultsTracking)
    {
        //abort_if(Gate::denies('results_tracking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ResultsTrackingResource($resultsTracking->load(['campaign', 'subscriber', 'subscription']));
    }

    public function update(UpdateResultsTrackingRequest $request, ResultsTracking $resultsTracking)
    {
        $resultsTracking->update($request->all());

        return (new ResultsTrackingResource($resultsTracking))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ResultsTracking $resultsTracking)
    {
        //abort_if(Gate::denies('results_tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resultsTracking->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
