<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
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
            'condition' => 'required',
            'brand' => 'required',
            'pattern' => 'required',
            'type' => 'required',
            'version' => 'required | max:25',
            'displacement' => 'required | max:10',
            'fuel' => 'required',
            'typeEngine' => 'required',
            'money' => 'required',
            'price' => 'required | numeric | max:9999999',
            'comment' => 'min:10',
            'files.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ];

        if ($request->input('condition') == 'Usada') {
            $rules = [
                'year' => 'required | max:4',
                'mileage' => 'required | numeric',
            ];
        }
    }

    public function messages()
    {
        return [
            'condition.required' => 'La condición de la moto es requerida',
            'brand.required' => 'La marca es requerida',
            'pattern.required' => 'El modelo es requerido',
            'type.required' => 'El tipo es requerido',
            'version.required' => 'La versión es requerido',
            'displacement.required' => 'La cilindradra es requerida',
            'displacement.max' => 'La cilindrada no puede superar los 10 caracteres',
            'year.required' => 'El año es requerido',
            'year.max' => 'El año no puede superar los 4 caracteres',
            'mileage.required' => 'El kilometraje es requerido',
            'mileage.numeric' => 'El kilometraje deben ser solo números',
            'fuel.required' => 'El combustible es requerido',
            'typeEngine.required' => 'El tipo de motor es requerido',
            'money.required' => 'El tipo de moneda es requerida',
            'price.required' => 'El precio es requerido',
            'price.numeric' => 'El precio deben ser un números',
            'comment.min' => 'El campo observanciones debe tener un mínimo de 10 caracteres',
            'payment.required' => 'Seleccione al menos un método de pago',
            'files.*.image' => 'El archivo debe ser una imágen',
            'files.*.mimes' => 'El archivo debe ser una imágen',
            'files.*.max' => 'La imágen debe pesar menos de 1MB',
        ];
    }
}
