<?php

namespace App\Http\Requests;

use App\Models\MailRoom;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMailRoomRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mail_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mail_rooms,id',
        ];
    }
}
