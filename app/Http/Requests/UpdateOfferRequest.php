<?php

namespace App\Http\Requests;

use App\Models\Offer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        //Gate::allows('offer_edit');
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
            'network_offer' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'network' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'optimized_thumbnail_url' => [
                'string',
                'nullable',
            ],
            'thumbnail_url' => [
                'string',
                'nullable',
            ],
            'visibility' => [
                'string',
                'nullable',
            ],
            'network_advertiser_name' => [
                'string',
                'nullable',
            ],
            'category' => [
                'string',
                'nullable',
            ],
            'network_offer_group' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'time_created' => [
                'date_format:'.config('panel.time_format'),
                'nullable',
            ],
            'time_saved' => [
                'date_format:'.config('panel.time_format'),
                'nullable',
            ],
            'destination_url' => [
                'string',
                'nullable',
            ],
            'today_clicks' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'revenue_type' => [
                'string',
                'nullable',
            ],
            'payout_type' => [
                'string',
                'nullable',
            ],
            'today_payout_amount' => [
                'numeric',
            ],
            'payout_amount' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'revenue_amount' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
