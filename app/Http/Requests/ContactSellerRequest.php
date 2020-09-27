<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactSellerRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'messageSeller' => 'required | min:10',
            'g-recaptcha-response' => 'recaptcha',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo del nombre es requerido',
            'email.required' => 'El campo del email es requerido',
            'messageSeller.required' => 'El mensaje es requerido',
            'messageSeller.min' => 'El mensaje no debería ser tan corto',
            'g-recaptcha-response.recaptcha' => 'El captcha es necesario.'
        ];
    }
}
