<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            //
            'name'=>['required','string','max:255','min:3'],
            'apellido'=>['required','string','max:255','min:3'],
            'email'=>['required','string','email','max:255','unique:users'],
            //'clie_pass'=>['required','string',Password::min(8)->uncompromised()],
            'password'=>['required','string',Password::min(5)],
        ];
    }
}
