<?php

namespace App\Modules\Post\Repositories;

use App\Models\Post;
use App\Modules\Post\DTO\PostCreateDTO;
use App\Modules\Post\DTO\PostPaginateDTO;
use App\Modules\Post\DTO\PostUpdateDTO;
use App\Modules\Post\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository implements PostRepositoryInterface
{
    public function paginate(PostPaginateDTO $paginateDTO): LengthAwarePaginator
    {
       return Post::paginate($paginateDTO->perPage, ['*'], 'page', $paginateDTO->page);
    }
    public function find(int $id): ?Post
    {
        return Post::find($id);
    }
    public function create(PostCreateDTO $postCreateDTO): Post
    {
        return Post::create([
            'user_id' => $postCreateDTO->user_id,
            'title' => $postCreateDTO->title,
            'content' => $postCreateDTO->content,
        ]);
    }
    public function update(int $id, PostUpdateDTO $postUpdateDTO): Post
    {
        $post = $this->find($id);

        if (!$post) {
            throw new ModelNotFoundException("Post with id {$id} not found");
        }

        $post->update($postUpdateDTO->toArray());
        return $post->fresh();
    }
    public function delete(int $id): bool
    {
        $post = $this->find($id);
        if (!$post) {
            throw new ModelNotFoundException("Post with id {$id} not found");
        }
        return $post->delete();

    }
}
