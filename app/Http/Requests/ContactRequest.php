<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required | min:3',
            'email' => 'required | email',
            'comment' => 'required | min:10',
            'g-recaptcha-response' => 'recaptcha',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'Revise que el nombre sea el correcto',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email no es válido',
            'comment.required' => 'Los comentarios son requeridos',
            'comment.min' => 'Por favor sea mas descriptivo en los comentarios',
            'g-recaptcha-response.recaptcha' => 'El captcha es necesario.'
        ];
    }
}
