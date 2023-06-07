<?php

namespace App\Http\Requests\DemoBalance;

use App\Http\Classes\Structure\Regexes;
use App\Http\DTO\DemoBalance\WorkWithDemoBalanceDto;
use App\Models\MySql\Biodeposit\DicCurrencies;
use Illuminate\Foundation\Http\FormRequest;

class WorkWithDemoBalanceRequest extends FormRequest
{
    public function rules() {
        return [
            'currency_name' => [
                'required',
                'string',
                'exists:' . DicCurrencies::class . ',name',
            ],
            'amount' => [
                'required',
                'numeric',
                'min:0',
                'regex:' . Regexes::ROUND_TWO_CHARACTERS,
            ]
        ];
    }

    public function getData(): WorkWithDemoBalanceDto
    {
        return new WorkWithDemoBalanceDto($this->validated());
    }
}
