<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        //Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            // 'name' => [
            //     'string',
            //     'required',
            // ],
            'first_name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
            ],
            'linkedin' => [
                'string',
                'nullable',
            ],
            'skype' => [
                'string',
                'nullable',
            ],
            'first_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'work_phone' => [
                'string',
                'nullable',
            ],
            'cell_phone' => [
                'string',
                'nullable',
            ],
            'instant_messaginid' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'instant_messaging_identifier' => [
                'string',
                'nullable',
            ],
            'labels.*' => [
                'integer',
            ],
            'labels' => [
                'array',
            ],
            'addresses.*' => [
                'integer',
            ],
            'addresses' => [
                'array',
            ],
            'adertisers.*' => [
                'integer',
            ],
            'adertisers' => [
                'array',
            ],
            'affiliates.*' => [
                'integer',
            ],
            'affiliates' => [
                'array',
            ],
        ];
    }
}
