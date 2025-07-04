<?php

namespace App\Modules\User\Repositories;

use App\Models\User;
use App\Modules\User\Repositories\Interfaces\UserRepositoryInterface;
use App\Modules\Auth\DTO\RegisterDTO;

class UserRepository implements UserRepositoryInterface
{
    public function create(RegisterDTO $registerDTO): User
    {
        return User::create([
            'name' => $registerDTO->name,
            'email' => $registerDTO->email,
            'password' => $registerDTO->password,
        ]);
    }

    public function findUserByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function createAuthToken(User $user): string
    {
        return $user->createToken('auth_token')->plainTextToken;
    }

    public function deleteCurrentToken(User $user): void
    {
        $user->currentAccessToken()->delete();
    }
}
