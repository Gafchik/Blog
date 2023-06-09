<?php

namespace App\Providers;

use App\Http\Classes\Core\UserInfo\UserInfo;
use App\Http\Classes\Core\UserInfo\UserInfoInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //        api auth
        $this->app->singleton(UserInfoInterface::class, UserInfo::class);
        $this->app->singleton('user_info_facade', UserInfoInterface::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
