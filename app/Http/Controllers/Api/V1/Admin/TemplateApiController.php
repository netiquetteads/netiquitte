<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Http\Resources\Admin\TemplateResource;
use App\Models\Template;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class TemplateApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        //abort_if(Gate::denies('template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TemplateResource(Template::all());
    }

    public function store(StoreTemplateRequest $request)
    {
        $template = Template::create($request->all());

        if ($request->input('offer_image', false)) {
            $template->addMedia(storage_path('tmp/uploads/'.basename($request->input('offer_image'))))->toMediaCollection('offer_image');
        }

        return (new TemplateResource($template))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Template $template)
    {
        //abort_if(Gate::denies('template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TemplateResource($template);
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

        return (new TemplateResource($template))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Template $template)
    {
        //abort_if(Gate::denies('template_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $template->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
