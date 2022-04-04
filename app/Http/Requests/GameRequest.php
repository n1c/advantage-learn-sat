<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    public function rules()
    {
        return [
            'left' => ['integer', 'numeric'],
            'right' => ['integer', 'numeric'],
        ];
    }
}
