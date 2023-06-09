<?php

namespace App\Http\DTO\Publication;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\Attributes\MapTo;
use Spatie\DataTransferObject\DataTransferObject;

class PublicationDto extends DataTransferObject
{
    #[MapFrom('id')]
    #[MapTo('id')]
    public ?int $id;

    #[MapFrom('title')]
    #[MapTo('title')]
    public ?string $title;

    #[MapFrom('text')]
    #[MapTo('text')]
    public ?string $text;
}
