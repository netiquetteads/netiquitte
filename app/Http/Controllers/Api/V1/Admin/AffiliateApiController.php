<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAffiliateRequest;
use App\Http\Requests\UpdateAffiliateRequest;
use App\Http\Resources\Admin\AffiliateResource;
use App\Models\Affiliate;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AffiliateApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        //abort_if(Gate::denies('affiliate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AffiliateResource(Affiliate::with(['account_status', 'team'])->get());
    }

    public function store(StoreAffiliateRequest $request)
    {
        $affiliate = Affiliate::create($request->all());

        if ($request->input('logo', false)) {
            $affiliate->addMedia(storage_path('tmp/uploads/'.basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($request->input('featured_image', false)) {
            $affiliate->addMedia(storage_path('tmp/uploads/'.basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        return (new AffiliateResource($affiliate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Affiliate $affiliate)
    {
        //abort_if(Gate::denies('affiliate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AffiliateResource($affiliate->load(['account_status', 'team']));
    }

    public function update(UpdateAffiliateRequest $request, Affiliate $affiliate)
    {
        $affiliate->update($request->all());

        if ($request->input('logo', false)) {
            if (! $affiliate->logo || $request->input('logo') !== $affiliate->logo->file_name) {
                if ($affiliate->logo) {
                    $affiliate->logo->delete();
                }
                $affiliate->addMedia(storage_path('tmp/uploads/'.basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($affiliate->logo) {
            $affiliate->logo->delete();
        }

        if ($request->input('featured_image', false)) {
            if (! $affiliate->featured_image || $request->input('featured_image') !== $affiliate->featured_image->file_name) {
                if ($affiliate->featured_image) {
                    $affiliate->featured_image->delete();
                }
                $affiliate->addMedia(storage_path('tmp/uploads/'.basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($affiliate->featured_image) {
            $affiliate->featured_image->delete();
        }

        return (new AffiliateResource($affiliate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Affiliate $affiliate)
    {
        //abort_if(Gate::denies('affiliate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
