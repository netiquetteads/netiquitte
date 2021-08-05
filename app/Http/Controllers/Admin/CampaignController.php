<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCampaignRequest;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Campaign;
use App\Models\Offer;
use App\Models\Template;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CampaignController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('campaign_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Campaign::with(['campaign_offer', 'selected_template'])->select(sprintf('%s.*', (new Campaign())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'campaign_show';
                $editGate = 'campaign_edit';
                $deleteGate = 'campaign_delete';
                $crudRoutePart = 'campaigns';

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
            $table->editColumn('email_subject', function ($row) {
                return $row->email_subject ? $row->email_subject : '';
            });
            $table->addColumn('campaign_offer_name', function ($row) {
                return $row->campaign_offer ? $row->campaign_offer->name : '';
            });

            $table->editColumn('subs', function ($row) {
                return $row->subs ? $row->subs : '';
            });
            $table->editColumn('opens', function ($row) {
                return $row->opens ? $row->opens : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'campaign_offer']);

            return $table->make(true);
        }

        return view('admin.campaigns.index');
    }

    public function create()
    {
        abort_if(Gate::denies('campaign_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign_offers = Offer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $selected_templates = Template::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.campaigns.create', compact('campaign_offers', 'selected_templates'));
    }

    public function store(StoreCampaignRequest $request)
    {
        $campaign = Campaign::create($request->all());

        if ($request->input('offer_image', false)) {
            $campaign->addMedia(storage_path('tmp/uploads/' . basename($request->input('offer_image'))))->toMediaCollection('offer_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $campaign->id]);
        }

        return redirect()->route('admin.campaigns.index');
    }

    public function edit(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign_offers = Offer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $selected_templates = Template::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campaign->load('campaign_offer', 'selected_template');

        return view('admin.campaigns.edit', compact('campaign_offers', 'selected_templates', 'campaign'));
    }

    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->all());

        if ($request->input('offer_image', false)) {
            if (!$campaign->offer_image || $request->input('offer_image') !== $campaign->offer_image->file_name) {
                if ($campaign->offer_image) {
                    $campaign->offer_image->delete();
                }
                $campaign->addMedia(storage_path('tmp/uploads/' . basename($request->input('offer_image'))))->toMediaCollection('offer_image');
            }
        } elseif ($campaign->offer_image) {
            $campaign->offer_image->delete();
        }

        return redirect()->route('admin.campaigns.index');
    }

    public function show(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign->load('campaign_offer', 'selected_template');

        return view('admin.campaigns.show', compact('campaign'));
    }

    public function destroy(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign->delete();

        return back();
    }

    public function massDestroy(MassDestroyCampaignRequest $request)
    {
        Campaign::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('campaign_create') && Gate::denies('campaign_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Campaign();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
