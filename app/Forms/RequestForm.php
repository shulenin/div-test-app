<?php

namespace App\Forms;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RequestForm
 * @package App\Http\Requests
 *
 * @property $title
 * @property $description
 */
class RequestForm extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
        ];
    }
}
