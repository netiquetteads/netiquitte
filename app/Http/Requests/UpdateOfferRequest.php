<?php

namespace App\Http\Requests;

use App\Models\Offer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOfferRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('offer_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'preview_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
