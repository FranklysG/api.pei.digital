<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'uuid' => 'string|required',
            'title' => 'string',
            'school' => 'string',
            'name' => 'string',
            'year' => 'string',
            'class' => 'string',
            'bout' => 'string',
            'birthdate' => 'string',
            'father' => 'string',
            'mother' => 'string',
            'diagnostic' => 'string',
            'description' => 'string',
            'specialist_bool' => 'boolean',
            'family_description' => 'string',
            'objective' => 'string',
            'proposal_one' => 'boolean',
            'proposal_two' => 'boolean',
            'proposal_three' => 'boolean',
            'proposal_four' => 'boolean',
            'proposal_six' => 'boolean',
            'proposal_seven' => 'boolean',
            'proposal_eigth' => 'boolean',
            'objective_adaptive' => 'string',
            'action_adaptive' => 'string',
            'resources_tech' => 'string',
            'resources_avaliation' => 'string',
            'object' => 'string',
            'conclusion' => 'string',
            'type' => 'string',
            'status' => 'string',
            'date' => 'string',
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
                'matematica' => [
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
