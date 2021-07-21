<?php

namespace App\Http\Requests;

use App\Models\MailRoom;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMailRoomRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        //Gate::allows('mail_room_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
