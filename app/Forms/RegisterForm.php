<?php

namespace App\Forms;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegisterForm
 * @package App\Forms
 */
class RegisterForm extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}