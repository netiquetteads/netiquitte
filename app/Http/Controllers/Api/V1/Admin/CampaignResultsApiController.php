<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampaignResultRequest;
use App\Http\Requests\UpdateCampaignResultRequest;
use App\Http\Resources\Admin\CampaignResultResource;
use App\Models\CampaignResult;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CampaignResultsApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('campaign_result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CampaignResultResource(CampaignResult::with(['campaign'])->get());
    }

    public function store(StoreCampaignResultRequest $request)
    {
        $campaignResult = CampaignResult::create($request->all());

        return (new CampaignResultResource($campaignResult))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CampaignResult $campaignResult)
    {
        //abort_if(Gate::denies('campaign_result_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CampaignResultResource($campaignResult->load(['campaign']));
    }

    public function update(UpdateCampaignResultRequest $request, CampaignResult $campaignResult)
    {
        $campaignResult->update($request->all());

        return (new CampaignResultResource($campaignResult))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CampaignResult $campaignResult)
    {
        //abort_if(Gate::denies('campaign_result_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaignResult->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
