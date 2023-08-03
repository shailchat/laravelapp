<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|min:3|max:10",
            "email" => "unique:employees|required|min:5"
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'A title is required',
            'email.required' => 'A message is required',
            'email.unique' => 'Try another email',
            'name.min' => "name is not long enough"
        ];
    }
}
