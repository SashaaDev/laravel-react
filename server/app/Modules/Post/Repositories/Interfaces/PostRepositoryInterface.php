<?php
namespace App\Modules\Post\Repositories\Interfaces;

use App\Models\Post;
use App\Modules\Post\DTO\PostCreateDTO;
use App\Modules\Post\DTO\PostPaginateDTO;
use App\Modules\Post\DTO\PostUpdateDTO;
use Illuminate\Pagination\LengthAwarePaginator;

interface PostRepositoryInterface
{
    public function paginate(PostPaginateDTO $paginateDTO):LengthAwarePaginator;
    public function find(int $id): ?Post;
    public function create(PostCreateDTO $postCreateDTO): Post;
    public function update(int $id, PostUpdateDTO $postUpdateDTO): Post;
    public function delete(int $id): bool;
}
