<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendItembyMailRequest extends FormRequest
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
            'g-recaptcha-response' => 'recaptcha',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'g-recaptcha-response.recaptcha' => 'El captcha es necesario.'
        ];
    }
}
