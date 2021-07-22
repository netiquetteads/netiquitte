<?php

namespace App\Http\Requests;

use App\Models\AccountStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAccountStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('account_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:account_statuses,id',
        ];
    }
}
