<?php

namespace App\Modules\Post\Requests;

use App\Modules\Post\DTO\PostUpdateDTO;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => ['nullable', 'exists:users,id'],
            'title' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
        ];
    }

    public function toDTO(): PostUpdateDTO
    {
        return PostUpdateDTO::fromArray($this->validated());
    }
}
