<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $rules = [
            'image' => 'image|nullable',
            'name' => 'required|alpha|between:2,50|string',
            'last_name' => 'required|alpha|between:2,50|string',
            'email' => ['required','email','unique:users'],
            'password' => 'required|alpha_dash|between:5,10',
            'position_id' => 'required|numeric',
            'role_id' => 'required|numeric',
            'department_id' => 'required|array',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $id = $this->input('user_id');
            $rules['email'][2] = Rule::unique('users')->ignore($id);
            $rules['password'] = 'nullable';
        }

        return $rules;
    }
}
