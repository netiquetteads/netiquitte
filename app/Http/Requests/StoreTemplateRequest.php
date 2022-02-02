<?php

namespace App\Http\Requests;

use App\Models\Template;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreTemplateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        //Gate::allows('template_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'email_subject' => [
                'string',
                'nullable',
            ],
        ];
    }
}
