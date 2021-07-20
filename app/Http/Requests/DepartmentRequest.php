<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartmentRequest extends FormRequest
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
            'title' => ['required','between:2,50','unique:departments'],
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $id = $this->input('department_id');
            $rules['title'][2] = Rule::unique('departments')->ignore($id);
        }

        return $rules;
    }
}
