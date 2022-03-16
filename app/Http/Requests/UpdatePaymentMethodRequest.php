<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentMethodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        //Gate::allows('payment_method_edit');
    }

    public function rules()
    {
        return [
            'account_name' => [
                'string',
                'nullable',
            ],
            'account_number' => [
                'string',
                'nullable',
            ],
            'routing_number' => [
                'string',
                'nullable',
            ],
            'swift' => [
                'string',
                'nullable',
            ],
        ];
    }
}
