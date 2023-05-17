<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'date_of_birth' => 'required|string|max:15',
            'personal_photo' => 'required|string|max:255'
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'The first name field is required.',
            'first_name.string' => 'The first name field must be a string.',
            'first_name.max' => 'The first name field must not exceed 50 characters.',
            'last_name.required' => 'The last name field is required.',
            'last_name.string' => 'The last name field must be a string.',
            'last_name.max' => 'The last name field must not exceed 50 characters.',
            'date_of_birth.required' => 'The date of birth field is required.',
            'date_of_birth.string' => 'The date of birth field must be a string.',
            'date_of_birth.max' => 'The date of birth field must not exceed 15 characters.',
            'personal_photo.required' => 'The personal photo field is required.',
            'personal_photo.string' => 'The personal photo field must be a string.',
            'personal_photo.max' => 'The personal photo field must not exceed 255 characters.'
        ];
    }

}
