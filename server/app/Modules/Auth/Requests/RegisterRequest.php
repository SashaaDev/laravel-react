<?php

namespace App\Modules\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;


class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "name" => "string|max:255",
            "email" => 'required|email|unique:users,email',
            "password" => 'required|string',
        ];
    }
}
