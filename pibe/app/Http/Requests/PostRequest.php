<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     
            'name'    => 'required|unique:posts,name,'. $this->post,
            'slug'      => 'required|unique:posts,slug,'. $this->post,
            'user_id'   => 'required|integer',
            // 'blog_category_id'  => 'required|integer',
            'abstract'  => 'required',
            // 'tags'     => 'required|array',
            'body'    => 'required',
            'image' => 'image',
        ];

        // if ($this->get('image')) 
        //     $rules = array_merge($rules, ['image' => 'required|mimes:jpg, jpeg, png']);

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del post es requerido',
            'name.unique'   => 'Este nombre ya se encuentra registrado',
            'slug.required'   => 'El slug del post es requerido',
            'slug.unique'     => 'Este slug ya se encuentra registrado',
            'user_id.required'=> 'El usuario empleado es requerido',
            'user_id.integer' => 'Solo puede ingresar numeros enteros',
            // 'blog_category_id.required'=> 'Seleccione un categoría',
            // 'blog_category_id.integer'=>  'Categoria no valida',
            'abstract.required'=> 'El extracto del post es requerido',
            // 'tags.required'  => 'Seleccione al menos una etiqueta',
            // 'tags.array'     => 'Seleccione mas de una',
            'body.required' => 'El contenido del post es requerido',
            // 'image.mimes'  => 'Formato de imagen no valido (Sólo jpg, jpeg, png, gif)',
        ];
    }
}
