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
            'title' => 'string|required',
            'school' => 'string|required',
            'name' => 'string|required',
            'year' => 'string|required',
            'class' => 'string|required',
            'bout' => 'string|required',
            'birthdate' => 'string|required',
            'father' => 'string|required',
            'mother' => 'string|required',
            'diagnostic' => 'string|required',
            'description' => 'string|required',
            'specialist_bool' => 'boolean|required',
            'family_description' => 'string|required',
            'objective' => 'string|required',
            'proposal_one' => 'boolean',
            'proposal_two' => 'boolean',
            'proposal_three' => 'boolean',
            'proposal_four' => 'boolean',
            'proposal_six' => 'boolean',
            'proposal_seven' => 'boolean',
            'proposal_eigth' => 'boolean',
            'objective_adaptive' => 'string|required',
            'action_adaptive' => 'string|required',
            'resources_tech' => 'string|required',
            'resources_avaliation' => 'string|required',
            'object' => 'string|required',
            'conclusion' => 'string|required',
            'type' => 'string',
            'status' => 'string',
            'date' => 'string',
            'workspace_uuid' => 'string|required',
            'specialist_uuid' => 'string|required',
            'skills' => [
                [
                    'uuid' => 'string',
                    'helper' => 'string'
                ]
            ],
            'specialtys' => [
                [
                    'name' => 'string',
                    'location' => 'string',
                    'professional' => 'string',
                    'day' => 'string',
                    'hour' => 'string',
                    'contact' => 'string'
                ]
            ],
            'goals' => [
                [
                    'goal' => 'string',
                    'period' => 'string',
                    'perfomance' => 'string',
                    'strategy' => 'string',
                    'resource' => 'string'
                ]
            ]
        ];
    }
}
