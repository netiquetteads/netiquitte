<?php

namespace App\Http\Requests;

use App\Models\Label;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLabelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('label_edit');
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
