<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAdvertiserRequest;
use App\Http\Requests\StoreAdvertiserRequest;
use App\Http\Requests\UpdateAdvertiserRequest;
use App\Models\Advertiser;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AdvertiserController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('advertiser_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertisers = Advertiser::with(['media'])->get();

        return view('frontend.advertisers.index', compact('advertisers'));
    }

    public function create()
    {
        abort_if(Gate::denies('advertiser_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.advertisers.create');
    }

    public function store(StoreAdvertiserRequest $request)
    {
        $advertiser = Advertiser::create($request->all());

        if ($request->input('featured_image', false)) {
            $advertiser->addMedia(storage_path('tmp/uploads/'.basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $advertiser->id]);
        }

        return redirect()->route('frontend.advertisers.index');
    }

    public function edit(Advertiser $advertiser)
    {
        abort_if(Gate::denies('advertiser_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.advertisers.edit', compact('advertiser'));
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

        return redirect()->route('frontend.advertisers.index');
    }

    public function show(Advertiser $advertiser)
    {
        abort_if(Gate::denies('advertiser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.advertisers.show', compact('advertiser'));
    }

    public function destroy(Advertiser $advertiser)
    {
        abort_if(Gate::denies('advertiser_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertiser->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdvertiserRequest $request)
    {
        Advertiser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('advertiser_create') && Gate::denies('advertiser_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Advertiser();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
