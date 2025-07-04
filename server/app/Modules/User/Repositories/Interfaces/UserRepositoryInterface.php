<?php

namespace App\Modules\User\Repositories\Interfaces;

use App\Models\User;
use App\Modules\Auth\DTO\RegisterDTO;

interface UserRepositoryInterface
{
    public function create(RegisterDTO $registerDTO): User;
    public function findUserByEmail(string $email): ?User;
    public function createAuthToken(User $user): string;
    public function deleteCurrentToken(User $user): void;
}
