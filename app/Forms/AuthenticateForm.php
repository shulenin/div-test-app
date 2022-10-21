<?php

namespace App\Forms;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticateForm extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }
}
