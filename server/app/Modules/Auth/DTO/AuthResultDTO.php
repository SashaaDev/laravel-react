<?php

namespace App\Modules\Auth\DTO;

use App\Models\User;

class AuthResultDTO
{
    public function __construct(
        public readonly string $token,
        public readonly User $user
    ) {
    }

    public function toArray(): array
    {
        return [
            'token' => $this->token,
            'user' => $this->user,
        ];
    }
}