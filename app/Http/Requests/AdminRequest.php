<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'titre'=>['required', 'min:2'],
            'description'=>['required', 'min:10'],
            'couleur'=>['required', 'min:2'],
            'image'=>['image','max:3000'],
            'status'=>['nullable'],
            'svg'=>['nullable']
        ];
    }
}
