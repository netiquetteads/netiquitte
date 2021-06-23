<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMailRoomRequest;
use App\Http\Requests\StoreMailRoomRequest;
use App\Http\Requests\UpdateMailRoomRequest;
use App\Models\MailRoom;
use App\Models\Template;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MailRoomController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('mail_room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MailRoom::with(['template', 'team'])->select(sprintf('%s.*', (new MailRoom())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'mail_room_show';
                $editGate = 'mail_room_edit';
                $deleteGate = 'mail_room_delete';
                $crudRoutePart = 'mail-rooms';

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
            $table->addColumn('template_name', function ($row) {
                return $row->template ? $row->template->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'template']);

            return $table->make(true);
        }

        return view('admin.mailRooms.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mail_room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $templates = Template::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.mailRooms.create', compact('templates'));
    }

    public function store(StoreMailRoomRequest $request)
    {
        $mailRoom = MailRoom::create($request->all());

        return redirect()->route('admin.mail-rooms.index');
    }

    public function edit(MailRoom $mailRoom)
    {
        abort_if(Gate::denies('mail_room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $templates = Template::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mailRoom->load('template', 'team');

        return view('admin.mailRooms.edit', compact('templates', 'mailRoom'));
    }

    public function update(UpdateMailRoomRequest $request, MailRoom $mailRoom)
    {
        $mailRoom->update($request->all());

        return redirect()->route('admin.mail-rooms.index');
    }

    public function show(MailRoom $mailRoom)
    {
        abort_if(Gate::denies('mail_room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mailRoom->load('template', 'team');

        return view('admin.mailRooms.show', compact('mailRoom'));
    }

    public function destroy(MailRoom $mailRoom)
    {
        abort_if(Gate::denies('mail_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mailRoom->delete();

        return back();
    }

    public function massDestroy(MassDestroyMailRoomRequest $request)
    {
        MailRoom::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
