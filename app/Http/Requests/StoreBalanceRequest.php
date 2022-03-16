<?php

namespace App\Http\Requests;

use App\Models\Balance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreBalanceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        //Gate::allows('balance_create');
    }

    public function rules()
    {
        return [];
    }
}
