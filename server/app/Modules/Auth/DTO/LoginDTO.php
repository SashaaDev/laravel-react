<?php

namespace App\Modules\Auth\DTO;

use App\Modules\Auth\Requests\LoginRequest;

class LoginDTO
{
    public function __construct(
        public string $email,
        public string $password
    ) {
    }

    public static function fromRequest(LoginRequest $loginRequest): self
    {
        return new self(
            email: $loginRequest->email,
            password: $loginRequest->password
        );
    }
}