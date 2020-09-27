<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccessoryNewRequest extends FormRequest
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
        return [
            'brand' => 'required',
            'pattern' => 'required',
            'condition' => 'required',
            'category' => 'required',
            'name' => 'required | max:100',
            'price' => 'required | numeric',
            'comment' => 'required | min:10',
        ];
    }
        public function messages()
    {
        return [
            'brand.required' => 'La marca es requerida',
            'pattern.required' => 'El modelo es requerido',
            'condition.required' => 'La condición del artículo es requerida',
            'category.required' => 'La categoría es requerida',
            'name.required' => 'La versión es requerido',
            'name.max' => 'El nombre no debe superar los 100 caracteres',
            'price.required' => 'El precio es requerido',
            'price.numeric' => 'El precio deben ser un números',
            'comment.required' => 'La descripción es requerida',
            'description.min' => 'La descripción debe tener mas de 10 caracteres',
        ];
    }
}
