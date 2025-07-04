<?php

namespace App\Modules\Post\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Modules\Post\DTO\PostPaginateDTO;
use App\Modules\Post\Requests\PostCreateRequest;
use App\Modules\Post\Requests\PostListRequest;
use App\Modules\Post\Requests\PostUpdateRequest;
use App\Modules\Post\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(private PostService $postService)
    {

    }
    public function index(PostListRequest $listRequest): JsonResponse
    {
        return response()->json($this->postService->list($listRequest->toDto()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PostCreateRequest $postCreateRequest): JsonResponse
    {
        return response()->json(
            $this->postService->create($postCreateRequest->toDTO()),
            201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
       return response()->json($this->postService->getById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, PostUpdateRequest $request): JsonResponse
    {
        return response()->json($this->postService->update($id, $request->toDTO()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json($this->postService->delete($id));
    }
}
