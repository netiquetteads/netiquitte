<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StorePaymentMethodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        //Gate::allows('payment_method_create');
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
