<?php

namespace App\Http\Requests;

use App\Models\Balance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBalanceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        //Gate::allows('balance_edit');
    }

    public function rules()
    {
        return [];
    }
}
