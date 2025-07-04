<?php

namespace App\Modules\Post\Requests;

use App\Modules\Post\DTO\PostPaginateDTO;
use Illuminate\Foundation\Http\FormRequest;

class PostListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page' => ['nullable', 'number', 'min: 1'],
            'per_page' => ['nullable', 'number', 'min: 1', 'max: 100'],
        ];
    }

    public function toDTO(): PostPaginateDTO
    {
        return PostPaginateDTO::fromArray($this->validated());
    }
}
