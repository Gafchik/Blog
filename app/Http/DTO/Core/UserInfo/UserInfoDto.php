<?php

namespace App\Http\DTO\Core\UserInfo;

use Spatie\DataTransferObject\{
    DataTransferObject,
    Attributes\MapFrom,
    Attributes\MapTo
};

class UserInfoDto extends DataTransferObject
{
    #[MapFrom('id')]
    #[MapTo('id')]
    public int $id;

    #[MapFrom('name')]
    #[MapTo('name')]
    public ?string $name;

    #[MapFrom('email')]
    #[MapTo('email')]
    public ?string $email;

    #[MapFrom('email_verified_at')]
    #[MapTo('emailVerifiedAt')]
    public ?string $emailVerifiedAt;

    #[MapFrom('remember_token')]
    #[MapTo('rememberToken')]
    public ?string $rememberToken;

    #[MapFrom('created_at')]
    #[MapTo('createdAt')]
    public ?string $createdAt;

    #[MapFrom('updated_at')]
    #[MapTo('updatedAt')]
    public ?string $updatedAt;

}
