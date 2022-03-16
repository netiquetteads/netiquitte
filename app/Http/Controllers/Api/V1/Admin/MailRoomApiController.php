<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMailRoomRequest;
use App\Http\Requests\UpdateMailRoomRequest;
use App\Http\Resources\Admin\MailRoomResource;
use App\Models\MailRoom;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MailRoomApiController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('mail_room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MailRoomResource(MailRoom::all());
    }

    public function store(StoreMailRoomRequest $request)
    {
        $mailRoom = MailRoom::create($request->all());

        return (new MailRoomResource($mailRoom))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MailRoom $mailRoom)
    {
        //abort_if(Gate::denies('mail_room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MailRoomResource($mailRoom);
    }

    public function update(UpdateMailRoomRequest $request, MailRoom $mailRoom)
    {
        $mailRoom->update($request->all());

        return (new MailRoomResource($mailRoom))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MailRoom $mailRoom)
    {
        //abort_if(Gate::denies('mail_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mailRoom->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
