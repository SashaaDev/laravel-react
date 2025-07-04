<?php

namespace App\Modules\Post\DTO;

class PostPaginateDTO
{
    public function __construct(
        public readonly int $page = 1,
        public readonly int $perPage = 10
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            page: max(1, (int) ($data['page'] ?? 1)),
            perPage: min(50, max(1, ($data['perPage'] ?? 10)))
        );
    }
}
