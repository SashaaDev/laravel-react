<?php
namespace App\Modules\Post\DTO;

class PostCreateDTO
{
    public function __construct(
        public int $user_id,
        public string $title,
        public string $content,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            user_id: $data['user_id'],
            title: $data['title'],
            content: $data['content'],
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
