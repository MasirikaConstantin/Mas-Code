<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class Astucesrequest extends FormRequest
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
   // 'image'=> ['nullable','image','mimes:png,jpg,jpeg;gif,svg', 'max:3000'],

    public function rules(): array
    {
        return [
            
                'titre'=>['required', 'min:5'],
                'video'=>['nullable'],
            'image'=> ['image', 'max:3000'],

                'tags'=>['array', 'exists:tags,id','required'],
                'slug'=>['required'],
                'contenus'=>['required', 'min:20'],
                'user_id'=> ['required', 'exists:users,id'],
                'categorie_id'=>['required', 'exists:categories,id'],
                'description'=>['required','min:10']

                
            
        ];
    }
    /*
    */
    protected function prepareForValidation(){
        $this->merge([
            'slug'=>$this->input('slug')?: Str::slug($this->input('titre'))
    
            ]);
    }
    

}
