<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\UpdateLabelRequest;
use App\Http\Resources\Admin\LabelResource;
use App\Models\Label;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class LabelApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('label_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LabelResource(Label::all());
    }

    public function store(StoreLabelRequest $request)
    {
        $label = Label::create($request->all());

        return (new LabelResource($label))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Label $label)
    {
        //abort_if(Gate::denies('label_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LabelResource($label);
    }

    public function update(UpdateLabelRequest $request, Label $label)
    {
        $label->update($request->all());

        return (new LabelResource($label))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Label $label)
    {
        //abort_if(Gate::denies('label_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $label->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
