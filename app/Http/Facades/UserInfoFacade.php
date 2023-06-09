<?php

namespace App\Http\Facades;

use App\Http\DTO\Core\UserInfo\UserInfoDto;
use Illuminate\Support\Facades\Facade;
use App\Http\Classes\Core\UserInfo\UserInfoInterface;

/**
 * @method static UserInfoDto getUserInfo();
 * @see UserInfoInterface
 */
class UserInfoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'user_info_facade';
    }
}
