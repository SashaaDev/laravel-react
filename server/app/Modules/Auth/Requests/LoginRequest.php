<?php

namespace App\Modules\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;


class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "email" => 'required|email',
            "password" => 'required|string',
        ];
    }
}
