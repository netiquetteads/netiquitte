<?php

namespace App\Http\Requests;

use App\Models\AccountStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAccountStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('account_status_create');
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
