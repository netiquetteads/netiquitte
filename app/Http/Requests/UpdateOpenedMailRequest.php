<?php

namespace App\Http\Requests;

use App\Models\OpenedMail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOpenedMailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('opened_mail_edit');
    }

    public function rules()
    {
        return [
            'open_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'open_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
