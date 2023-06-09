<?php

namespace App\Http\Requests\Publication;

use App\Http\DTO\Publication\PublicationDto;
use Illuminate\Foundation\Http\FormRequest;

class PublicationSendRequest extends FormRequest
{
    public function rules() {
        return [
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
