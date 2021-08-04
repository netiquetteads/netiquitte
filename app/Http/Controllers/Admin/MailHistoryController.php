<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMailHistoryRequest;
use App\Http\Requests\StoreMailHistoryRequest;
use App\Http\Requests\UpdateMailHistoryRequest;
use App\Models\MailHistory;
use App\Models\Template;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MailHistoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('mail_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MailHistory::with(['posted_campaign'])->select(sprintf('%s.*', (new MailHistory())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'mail_history_show';
                $editGate = 'mail_history_edit';
                $deleteGate = 'mail_history_delete';
                $crudRoutePart = 'mail-histories';

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
            $table->addColumn('posted_campaign_name', function ($row) {
                return $row->posted_campaign ? $row->posted_campaign->name : '';
            });

            $table->editColumn('posted_campaign.email_subject', function ($row) {
                return $row->posted_campaign ? (is_string($row->posted_campaign) ? $row->posted_campaign : $row->posted_campaign->email_subject) : '';
            });

            $table->editColumn('unopened', function ($row) {
                return $row->unopened ? $row->unopened : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'posted_campaign']);

            return $table->make(true);
        }

        return view('admin.mailHistories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mail_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posted_campaigns = Template::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.mailHistories.create', compact('posted_campaigns'));
    }

    public function store(StoreMailHistoryRequest $request)
    {
        $mailHistory = MailHistory::create($request->all());

        return redirect()->route('admin.mail-histories.index');
    }

    public function edit(MailHistory $mailHistory)
    {
        abort_if(Gate::denies('mail_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posted_campaigns = Template::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mailHistory->load('posted_campaign');

        return view('admin.mailHistories.edit', compact('posted_campaigns', 'mailHistory'));
    }

    public function update(UpdateMailHistoryRequest $request, MailHistory $mailHistory)
    {
        $mailHistory->update($request->all());

        return redirect()->route('admin.mail-histories.index');
    }

    public function show(MailHistory $mailHistory)
    {
        abort_if(Gate::denies('mail_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mailHistory->load('posted_campaign');

        return view('admin.mailHistories.show', compact('mailHistory'));
    }

    public function destroy(MailHistory $mailHistory)
    {
        abort_if(Gate::denies('mail_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mailHistory->delete();

        return back();
    }

    public function massDestroy(MassDestroyMailHistoryRequest $request)
    {
        MailHistory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
