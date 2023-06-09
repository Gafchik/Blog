<?php

namespace App\Http\Classes\Core\UserInfo;

use App\Http\DTO\Core\UserInfo\UserInfoDto;
use Illuminate\Support\Facades\Auth;

class UserInfo implements UserInfoInterface
{

    public function __construct()
    {}

    public function getUserInfo(): UserInfoDto
    {
        $user = Auth::user();
        return new UserInfoDto($user->toArray());
    }
}
