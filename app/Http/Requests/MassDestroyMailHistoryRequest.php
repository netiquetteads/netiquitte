<?php

namespace App\Http\Requests;

use App\Models\MailHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMailHistoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mail_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mail_histories,id',
        ];
    }
}
