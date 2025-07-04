<?php

namespace App\Modules\Auth\Services;

use App\Models\User;
use App\Modules\Auth\DTO\LoginDTO;
use App\Modules\Auth\DTO\RegisterDTO;
use App\Modules\User\Repositories\UserRepository;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function register(RegisterDTO $registerDTO): array
    {
        $user = $this->userRepository->create($registerDTO);

        $token = $this->userRepository->createAuthToken($user);

        return [
            "user" => $user,
            "token" => $token
        ];
    }

    public function login(LoginDTO $loginDTO): string
    {
        $user = $this->userRepository->findUserByEmail($loginDTO->email);

        if (!$user || !Hash::check($loginDTO->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials']
            ]);
        }

        return $this->userRepository->createAuthToken($user);
    }

    public function logout(User $user): void
    {
        $this->userRepository->deleteCurrentToken($user);
    }
}
