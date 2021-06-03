<?php

namespace App\Http\Requests;

use App\Models\MailRoom;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMailRoomRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mail_room_create');
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
