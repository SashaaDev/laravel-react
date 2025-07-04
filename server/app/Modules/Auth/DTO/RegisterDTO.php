<?php

namespace App\Modules\Auth\DTO;

use App\Modules\Auth\Requests\LoginRequest;
use App\Modules\Auth\Requests\RegisterRequest;

class RegisterDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ) {
    }

    public static function fromRequest(RegisterRequest $registerRequest): self
    {
        return new self(
            name: $registerRequest->name,
            email: $registerRequest->email,
            password: $registerRequest->password
        );
    }
}