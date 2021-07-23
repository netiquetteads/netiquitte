<?php

namespace App\Http\Requests;

use App\Models\PaymentStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_status_create');
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
