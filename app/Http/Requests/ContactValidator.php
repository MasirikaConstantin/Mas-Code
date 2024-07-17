<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactValidator extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom'=>['required', 'string','min:4'],
            'prenom'=>['required', 'string','min:4'],
            'phone'=>['required', 'string','min:9'],
            'email'=>['required', 'email','min:4'],
            'message'=>['required', 'string','min:4']
        ];
    }
}
