<?php
namespace App\Modules\Post\DTO;

use App\Modules\Post\Requests\PostCreateRequest;

class PostCreateDTO
{
    public function __construct(
        public int $user_id,
        public string $title,
        public string $content,
    ) {
    }

    public static function fromArray(array $postCreate): self
    {
        return new self(
            user_id: $postCreate['user_id'],
            title: $postCreate['title'],
            content: $postCreate['content'],
        );
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'title' => $this->title,
            'content' => $this->content
        ];
    }
}
