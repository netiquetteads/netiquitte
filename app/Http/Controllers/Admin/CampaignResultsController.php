<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCampaignResultRequest;
use App\Http\Requests\StoreCampaignResultRequest;
use App\Http\Requests\UpdateCampaignResultRequest;
use App\Models\Campaign;
use App\Models\CampaignResult;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CampaignResultsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('campaign_result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CampaignResult::with(['campaign'])->select(sprintf('%s.*', (new CampaignResult())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'campaign_result_show';
                $editGate = 'campaign_result_edit';
                $deleteGate = 'campaign_result_delete';
                $crudRoutePart = 'campaign-results';

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
            $table->addColumn('campaign_name', function ($row) {
                return $row->campaign ? $row->campaign->name : '';
            });

            $table->editColumn('campaign.email_subject', function ($row) {
                return $row->campaign ? (is_string($row->campaign) ? $row->campaign : $row->campaign->email_subject) : '';
            });

            $table->editColumn('unopened', function ($row) {
                return $row->unopened ? $row->unopened : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'campaign']);

            return $table->make(true);
        }

        return view('admin.campaignResults.index');
    }

    public function create()
    {
        abort_if(Gate::denies('campaign_result_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaigns = Campaign::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.campaignResults.create', compact('campaigns'));
    }

    public function store(StoreCampaignResultRequest $request)
    {
        $campaignResult = CampaignResult::create($request->all());

        return redirect()->route('admin.campaign-results.index');
    }

    public function edit(CampaignResult $campaignResult)
    {
        abort_if(Gate::denies('campaign_result_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaigns = Campaign::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campaignResult->load('campaign');

        return view('admin.campaignResults.edit', compact('campaigns', 'campaignResult'));
    }

    public function update(UpdateCampaignResultRequest $request, CampaignResult $campaignResult)
    {
        $campaignResult->update($request->all());

        return redirect()->route('admin.campaign-results.index');
    }

    public function show(CampaignResult $campaignResult)
    {
        abort_if(Gate::denies('campaign_result_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaignResult->load('campaign');

        return view('admin.campaignResults.show', compact('campaignResult'));
    }

    public function destroy(CampaignResult $campaignResult)
    {
        abort_if(Gate::denies('campaign_result_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaignResult->delete();

        return back();
    }

    public function massDestroy(MassDestroyCampaignResultRequest $request)
    {
        CampaignResult::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
