<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'uuid', 'string',
            'title' => 'string|required',
            'name' => 'string|required',
            'year' => 'string|required',
            'class' => 'string|required',
            'bout' => 'string|required',
            'birthdate' => 'string|required',
            'father' => 'string|required',
            'mother' => 'string|required',
            'diagnostic' => 'string|required',
            'especialist' => 'string|required',
            'description' => 'string|required',
            'workspace_uuid' => 'string|required',
            'specialist_uuid' => 'string|required',
            'skills' => [
                [
                    'uuid' => 'string|required',
                    'helper' => 'string'
                ]
            ]
        ];
    }
}
