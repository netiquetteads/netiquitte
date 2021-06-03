<?php

namespace App\Http\Requests;

use App\Models\Template;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTemplateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('template_edit');
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
