<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOpenedMailRequest;
use App\Http\Requests\StoreOpenedMailRequest;
use App\Http\Requests\UpdateOpenedMailRequest;
use App\Models\MailHistory;
use App\Models\OpenedMail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OpenedMailController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('opened_mail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OpenedMail::with(['campaige'])->select(sprintf('%s.*', (new OpenedMail())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'opened_mail_show';
                $editGate = 'opened_mail_edit';
                $deleteGate = 'opened_mail_delete';
                $crudRoutePart = 'opened-mails';

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
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('open_time', function ($row) {
                return $row->open_time ? $row->open_time : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.openedMails.index');
    }

    public function create()
    {
        abort_if(Gate::denies('opened_mail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaiges = MailHistory::pluck('campaign', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.openedMails.create', compact('campaiges'));
    }

    public function store(StoreOpenedMailRequest $request)
    {
        $openedMail = OpenedMail::create($request->all());

        return redirect()->route('admin.opened-mails.index');
    }

    public function edit(OpenedMail $openedMail)
    {
        abort_if(Gate::denies('opened_mail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaiges = MailHistory::pluck('campaign', 'id')->prepend(trans('global.pleaseSelect'), '');

        $openedMail->load('campaige');

        return view('admin.openedMails.edit', compact('campaiges', 'openedMail'));
    }

    public function update(UpdateOpenedMailRequest $request, OpenedMail $openedMail)
    {
        $openedMail->update($request->all());

        return redirect()->route('admin.opened-mails.index');
    }

    public function show(OpenedMail $openedMail)
    {
        abort_if(Gate::denies('opened_mail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $openedMail->load('campaige');

        return view('admin.openedMails.show', compact('openedMail'));
    }

    public function destroy(OpenedMail $openedMail)
    {
        abort_if(Gate::denies('opened_mail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $openedMail->delete();

        return back();
    }

    public function massDestroy(MassDestroyOpenedMailRequest $request)
    {
        OpenedMail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
