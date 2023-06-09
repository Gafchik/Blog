<?php

namespace App\Http\Requests\Publication;

use App\Http\DTO\Publication\PublicationDto;
use App\Models\MySql\Blog\Publication;
use Illuminate\Foundation\Http\FormRequest;

class EditPublicationRequest extends FormRequest
{
    public function rules() {
        return [
            'id' => [
                'required',
                'int',
                'exists:' . Publication::class . ',id',
            ],
            'title' => [
                'required',
                'string',
                'max:50',
            ],
            'text' => [
                'required',
                'string',
                'max:50',
            ],
        ];
    }

    public function getData(): PublicationDto
    {
        return new PublicationDto($this->validated());
    }
}
