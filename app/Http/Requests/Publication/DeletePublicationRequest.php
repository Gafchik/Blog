<?php

namespace App\Http\Requests\Publication;

use App\Http\DTO\Publication\PublicationDto;
use App\Models\MySql\Blog\Publication;
use Illuminate\Foundation\Http\FormRequest;

class DeletePublicationRequest extends FormRequest
{
    public function rules() {
        return [
            'id' => [
                'required',
                'int',
                'exists:' . Publication::class . ',id',
            ],
        ];
    }

    public function getData(): PublicationDto
    {
        return new PublicationDto($this->validated());
    }
}
