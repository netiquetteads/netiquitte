<?php

namespace App\Http\Requests;

use App\Models\Advertiser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdvertiserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        //return Gate::allows('advertiser_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'everflow_account' => [
                'string',
                'nullable',
            ],
            'account_manager_name' => [
                'string',
                'nullable',
            ],
            'account_executive_name' => [
                'string',
                'nullable',
            ],
            'balance' => [
                'numeric',
            ],
            'last_login' => [
                'date_format:'.config('panel.date_format').' '.config('panel.time_format'),
                'nullable',
            ],
            'network_country_code' => [
                'string',
                'nullable',
            ],
            'global_tracking_domain_url' => [
                'string',
                'nullable',
            ],
            'network_affiliateid' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'account_executiveid' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'account_managerid' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'networkid' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'network_employeeid' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sales_managerid' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'platform_name' => [
                'string',
                'nullable',
            ],
            'platform_url' => [
                'string',
                'nullable',
            ],
            'platform_username' => [
                'string',
                'nullable',
            ],
            'offer_id_macro' => [
                'string',
                'nullable',
            ],
            'affiliate_id_macro' => [
                'string',
                'nullable',
            ],
            'attribution_method' => [
                'string',
                'nullable',
            ],
            'email_attribution_method' => [
                'string',
                'nullable',
            ],
            'network_advertiserid' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sales_manager_name' => [
                'string',
                'nullable',
            ],
            'today_revenue' => [
                'string',
                'nullable',
            ],
        ];
    }
}
