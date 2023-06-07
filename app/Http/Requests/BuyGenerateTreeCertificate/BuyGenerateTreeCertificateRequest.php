<?php

namespace App\Http\Requests\BuyGenerateTreeCertificate;

use App\Http\DTO\BuyGenerateTreeCertificate\BuyGenerateTreeCertificateDto;
use Illuminate\Foundation\Http\FormRequest;

class BuyGenerateTreeCertificateRequest extends FormRequest
{
    public function rules() {
        return [
            'count_trees' => [
                'required',
                'int',
                'min:1',
            ],
        ];
    }

    public function getData(): BuyGenerateTreeCertificateDto
    {
        return new BuyGenerateTreeCertificateDto($this->validated());
    }
}
