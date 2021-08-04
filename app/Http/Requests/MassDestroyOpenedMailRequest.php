<?php

namespace App\Http\Requests;

use App\Models\OpenedMail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOpenedMailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('opened_mail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:opened_mails,id',
        ];
    }
}
