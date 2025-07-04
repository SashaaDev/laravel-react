<?php

namespace App\Modules\Post\Requests;

use App\Modules\Post\DTO\PostCreateDTO;
use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ];
    }

    public function toDTO(): PostCreateDTO
    {
        return PostCreateDTO::fromArray($this->validated());
    }
}
