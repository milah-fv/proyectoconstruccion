<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
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
            'name' => 'required|unique:blog_category,name,'. $this->blog_category,
            'slug'   => 'required|unique:blog_category,slug,' . $this->blog_category,
        ];
        return $rules;
    }

    public function messages()
    {
        return
        [
            'name.required' => 'El nombre de la categoria es requerido',
            'name.unique'   => 'Este nombre ya se encuentra registrado',
            'slug.required'   => 'El slug de la categoria es requerido',
            'slug.unique'   => 'Este slug ya se encuentra registrado',
        ];
    }
}
