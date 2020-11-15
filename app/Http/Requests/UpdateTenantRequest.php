<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTenantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => [
                'email',
                'required',
                Rule::unique('users')->ignore($this->tenant)
            ],
            'domain' => [
                'required',
                'alpha_num',
                Rule::unique('users')->ignore($this->tenant)
            ]
        ];
    }
}
