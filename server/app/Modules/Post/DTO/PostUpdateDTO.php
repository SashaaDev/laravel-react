<?php
namespace App\Modules\Post\DTO;

class PostUpdateDTO
{
    public function __construct(
        public ?int $user_id = null,
        public ?string $title = null,
        public ?string $content = null,
    ) {
    }

    public static function fromArray(array $postUpdate): self
    {
        return new self(
            user_id: $postUpdate['user_id'] ?? null,
            title: $postUpdate['title'] ?? null,
            content: $postUpdate['content'] ?? null,
        );
    }

    public function toArray(): array
    {
        return array_filter([
            'user_id' => $this->user_id,
            'title' => $this->title,
            'content' => $this->content
        ], fn($value) => !is_null($value));
    }
}
