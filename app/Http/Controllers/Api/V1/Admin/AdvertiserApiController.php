<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAdvertiserRequest;
use App\Http\Requests\UpdateAdvertiserRequest;
use App\Http\Resources\Admin\AdvertiserResource;
use App\Models\Advertiser;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AdvertiserApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        //abort_if(Gate::denies('advertiser_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdvertiserResource(Advertiser::all());
    }

    public function store(StoreAdvertiserRequest $request)
    {
        $advertiser = Advertiser::create($request->all());

        if ($request->input('featured_image', false)) {
            $advertiser->addMedia(storage_path('tmp/uploads/'.basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        return (new AdvertiserResource($advertiser))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Advertiser $advertiser)
    {
        //abort_if(Gate::denies('advertiser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdvertiserResource($advertiser);
    }

    public function update(UpdateAdvertiserRequest $request, Advertiser $advertiser)
    {
        $advertiser->update($request->all());

        if ($request->input('featured_image', false)) {
            if (! $advertiser->featured_image || $request->input('featured_image') !== $advertiser->featured_image->file_name) {
                if ($advertiser->featured_image) {
                    $advertiser->featured_image->delete();
                }
                $advertiser->addMedia(storage_path('tmp/uploads/'.basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($advertiser->featured_image) {
            $advertiser->featured_image->delete();
        }

        return (new AdvertiserResource($advertiser))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Advertiser $advertiser)
    {
        //abort_if(Gate::denies('advertiser_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertiser->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
