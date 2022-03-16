<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMailRoomRequest;
use App\Http\Requests\StoreMailRoomRequest;
use App\Http\Requests\UpdateMailRoomRequest;
use App\Models\MailRoom;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MailRoomController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mail_room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mailRooms = MailRoom::all();

        return view('frontend.mailRooms.index', compact('mailRooms'));
    }

    public function create()
    {
        abort_if(Gate::denies('mail_room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.mailRooms.create');
    }

    public function store(StoreMailRoomRequest $request)
    {
        $mailRoom = MailRoom::create($request->all());

        return redirect()->route('frontend.mail-rooms.index');
    }

    public function edit(MailRoom $mailRoom)
    {
        abort_if(Gate::denies('mail_room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.mailRooms.edit', compact('mailRoom'));
    }

    public function update(UpdateMailRoomRequest $request, MailRoom $mailRoom)
    {
        $mailRoom->update($request->all());

        return redirect()->route('frontend.mail-rooms.index');
    }

    public function show(MailRoom $mailRoom)
    {
        abort_if(Gate::denies('mail_room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.mailRooms.show', compact('mailRoom'));
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
