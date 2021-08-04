<?php

namespace App\Http\Requests;

use App\Models\MailHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMailHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mail_history_create');
    }

    public function rules()
    {
        return [
            'time_sent' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'emails_sent' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'list' => [
                'string',
                'nullable',
            ],
            'opens' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'unopened' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'campaign' => [
                'string',
                'nullable',
            ],
        ];
    }
}
