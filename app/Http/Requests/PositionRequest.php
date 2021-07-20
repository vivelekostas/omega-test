<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PositionRequest extends FormRequest
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
            'title' => ['required','between:2,50','unique:positions'],
            'salary' => ['required','numeric'],
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $id = $this->input('position_id');
            $rules['title'][2] = Rule::unique('positions')->ignore($id);
        }

        return $rules;
    }

}
