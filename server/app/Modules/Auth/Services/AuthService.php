<?php

namespace App\Modules\Auth\Services;

use App\Models\User;
use App\Modules\Auth\DTO\AuthResultDTO;
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

    public function register(RegisterDTO $registerDTO): AuthResultDTO
    {
        $user = $this->userRepository->create($registerDTO);

        $token = $this->userRepository->createAuthToken($user);

        return new AuthResultDTO($token, $user);

    }

    public function login(LoginDTO $loginDTO): AuthResultDTO
    {
        $user = $this->userRepository->findUserByEmail($loginDTO->email);

        if (!$user || !Hash::check($loginDTO->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials']
            ]);
        }
        $token = $this->userRepository->createAuthToken($user);

        return new AuthResultDTO($token, $user);
    }

    public function logout(User $user): void
    {
        $this->userRepository->deleteCurrentToken($user);
    }
}
