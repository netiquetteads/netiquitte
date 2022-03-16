<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Http\Resources\Admin\CampaignResource;
use App\Models\Campaign;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CampaignApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        //abort_if(Gate::denies('campaign_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CampaignResource(Campaign::with(['campaign_offer', 'selected_template'])->get());
    }

    public function store(StoreCampaignRequest $request)
    {
        $campaign = Campaign::create($request->all());

        if ($request->input('offer_image', false)) {
            $campaign->addMedia(storage_path('tmp/uploads/'.basename($request->input('offer_image'))))->toMediaCollection('offer_image');
        }

        return (new CampaignResource($campaign))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Campaign $campaign)
    {
        //abort_if(Gate::denies('campaign_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CampaignResource($campaign->load(['campaign_offer', 'selected_template']));
    }

    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->all());

        if ($request->input('offer_image', false)) {
            if (! $campaign->offer_image || $request->input('offer_image') !== $campaign->offer_image->file_name) {
                if ($campaign->offer_image) {
                    $campaign->offer_image->delete();
                }
                $campaign->addMedia(storage_path('tmp/uploads/'.basename($request->input('offer_image'))))->toMediaCollection('offer_image');
            }
        } elseif ($campaign->offer_image) {
            $campaign->offer_image->delete();
        }

        return (new CampaignResource($campaign))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Campaign $campaign)
    {
        //abort_if(Gate::denies('campaign_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
