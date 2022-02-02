<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTemplateRequest;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Models\Template;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TemplateController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $templates = Template::with(['media'])->get();

        return view('frontend.templates.index', compact('templates'));
    }

    public function create()
    {
        abort_if(Gate::denies('template_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.templates.create');
    }

    public function store(StoreTemplateRequest $request)
    {
        $template = Template::create($request->all());

        if ($request->input('offer_image', false)) {
            $template->addMedia(storage_path('tmp/uploads/'.basename($request->input('offer_image'))))->toMediaCollection('offer_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $template->id]);
        }

        return redirect()->route('frontend.templates.index');
    }

    public function edit(Template $template)
    {
        abort_if(Gate::denies('template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.templates.edit', compact('template'));
    }

    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $template->update($request->all());

        if ($request->input('offer_image', false)) {
            if (! $template->offer_image || $request->input('offer_image') !== $template->offer_image->file_name) {
                if ($template->offer_image) {
                    $template->offer_image->delete();
                }
                $template->addMedia(storage_path('tmp/uploads/'.basename($request->input('offer_image'))))->toMediaCollection('offer_image');
            }
        } elseif ($template->offer_image) {
            $template->offer_image->delete();
        }

        return redirect()->route('frontend.templates.index');
    }

    public function show(Template $template)
    {
        abort_if(Gate::denies('template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.templates.show', compact('template'));
    }

    public function destroy(Template $template)
    {
        abort_if(Gate::denies('template_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $template->delete();

        return back();
    }

    public function massDestroy(MassDestroyTemplateRequest $request)
    {
        Template::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('template_create') && Gate::denies('template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Template();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
