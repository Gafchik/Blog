<?php

namespace App\Http\Classes\Core\UserInfo;

use App\Models\MySql\Biodeposit\{
    Users,
    DemoBalance,
    DicCurrencies,
    UserInfo as UserInfoTable,
};
use Illuminate\Database\Eloquent\Builder;

class UserInfoModel
{
    public function __construct(
        private Users $userModel,
        private DemoBalance $demoBalance,
        private DicCurrencies $dicCurrencies,
        private UserInfoTable $userInfo
    )
    {
    }

    public function getUserInfo(string $uuid): array
    {
        $user = $this->getBaseUserQuery()
            ->where('userModel.uuid',$uuid)
            ->select([
                'userModel.id',
                'userModel.uuid',
                'userModel.email',
                'userModel.permissions',
                'userModel.last_login',
                'userModel.referral_link',
                'userModel.created_at',
                'userModel.updated_at',
                'userModel.deleted_at',
                'userModel.deleted_email',
                'userModel.enable_2_fact',
                'userModel.google2fa_secret',
                'userModel.is_active_user',
                'userInfo.first_name',
                'userInfo.last_name',
                'userInfo.phone',
                'userInfo.gender',
                'userInfo.birthday',
                'userInfo.avatar',
                'userInfo.created_at',
                'userInfo.updated_at',
                'userInfo.codePromo',
                'userInfo.level',
            ])
            ->first()
            ->toArray();

        $user['demo_balance'] = $this->getDemoBalance($user['id']);

        return $user;
    }

    private function getBaseUserQuery(): Builder
    {
        return $this->userModel
            ->from($this->userModel->getTable(). ' as userModel')
            ->leftJoin($this->userInfo->getTable() . ' as userInfo',
                'userModel.id',
                '=',
                'userInfo.user_id'
            );
    }

    private function getDemoBalance(int $userId): array
    {
        return $this->demoBalance
            ->from($this->demoBalance->getTable(). ' as demoBalance')
            ->leftJoin($this->dicCurrencies->getTable() . ' as dicCurrencies',
                'demoBalance.currency_id',
                '=',
                'dicCurrencies.id'
            )
            ->select([
                'demoBalance.id',
                'demoBalance.balance',
                'dicCurrencies.name as currency_name',
            ])
            ->where('demoBalance.user_id',$userId)
            ->get()
            ->toArray();
    }
}
