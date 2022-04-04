<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    public function rules()
    {
        return [
            'left' => ['min:0', 'required', 'integer', 'numeric'],
            'right' => ['min:0', 'required', 'integer', 'numeric'],
        ];
    }
}
