<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTemplateRequest;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Models\Offer;
use App\Models\Template;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TemplateController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('template_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Template::with(['offer_selection'])->select(sprintf('%s.*', (new Template())->table));
            $table = Datatables::of($query);

            $table->editColumn('placeholder', function ($row) {
                return '<input type="checkbox" name="selectdata" id="selectdata'.$row->id.'" value="'.$row->id.'">';
            });
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'template_show';
                $editGate = 'template_edit';
                $deleteGate = 'template_delete';
                $crudRoutePart = 'templates';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.templates.index');
    }

    public function create(Request $request)
    {
        abort_if(Gate::denies('template_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $selectedOffers = Offer::where('offer_status', 'active')->whereIn('id', explode(',', $request->OfferSelection))->get();

        $offer_selections = Offer::where('offer_status', 'active')->pluck('name', 'id');

        return view('admin.templates.create', compact('offer_selections', 'selectedOffers'));
    }

    public function store(StoreTemplateRequest $request)
    {
        $template = Template::create($request->all());
        $template->templateOffers()->sync($request->input('offer_selection_id', []));

        if ($request->input('offer_image', false)) {
            $template->addMedia(storage_path('tmp/uploads/'.basename($request->input('offer_image'))))->toMediaCollection('offer_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $template->id]);
        }

        // $MyTemplate=Template::where('id',$template->id)->first();

        // $offerImg='<img width="100%" src="'.$MyTemplate->offer_image->getUrl().'" />';
        // $content = str_replace('{Offers_Image}', $offerImg, $MyTemplate->content);
        // $MyTemplate->content=$content;
        // $MyTemplate->save();

        return redirect()->route('admin.templates.index');
    }

    public function edit(Template $template, Request $request)
    {
        abort_if(Gate::denies('template_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offer_selections = Offer::where('offer_status', 'active')->pluck('name', 'id');

        $selectedOffers = Offer::where('offer_status', 'active')->whereIn('id', explode(',', $request->OfferSelection))->get();

        $template->load('offer_selection');

        return view('admin.templates.edit', compact('offer_selections', 'template', 'selectedOffers'));
    }

    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $template->update($request->all());
        $template->templateOffers()->sync($request->input('offer_selection_id', []));

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

        return redirect()->route('admin.templates.index');
    }

    public function show(Template $template)
    {
        abort_if(Gate::denies('template_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $template->load('offer_selection');

        return view('admin.templates.show', compact('template'));
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

    public function deleteSelectedTemplate(Request $request)
    {
        Template::destroy($request->ids);
        echo 1;
    }
}
