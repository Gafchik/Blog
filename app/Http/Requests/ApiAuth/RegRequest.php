<?php

namespace App\Http\Requests\ApiAuth;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
{
    public function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
