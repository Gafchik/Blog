<?php

namespace App\Http\Classes\Core\UserInfo;

use App\Http\DTO\Core\UserInfo\UserInfoDto;

interface UserInfoInterface
{
    public function getUserInfo(): UserInfoDto;
}
