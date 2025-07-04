<?php

namespace App\Modules\Post\Services;

use App\Models\Post;
use App\Modules\Post\DTO\PostCreateDTO;
use App\Modules\Post\DTO\PostPaginateDTO;
use App\Modules\Post\DTO\PostUpdateDTO;
use App\Modules\Post\Repositories\PostRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PostService
{
    public function __construct(private readonly PostRepository $postRepository){
    }
    public function list(PostPaginateDTO $paginateDTO): LengthAwarePaginator
    {
        return $this->postRepository->paginate($paginateDTO);
    }

    public function getById(int $id): ?Post
    {
        return $this->postRepository->find($id);
    }

    public function create(PostCreateDTO $postCreateDTO): Post
    {
        return $this->postRepository->create($postCreateDTO);
    }

    public function update(int $id, PostUpdateDTO $postUpdateDTO): Post
    {
        return $this->postRepository->update($id, $postUpdateDTO);
    }
    public function delete(int $id): bool
    {
        return $this->postRepository->delete($id);
    }
}
