<?php

namespace App\Http\Requests;

use App\Models\Affiliate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAffiliateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        //Gate::allows('affiliate_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
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
        ];
    }
}
