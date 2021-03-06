<?php

namespace Someline\Models\Foundation;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Someline\Image\Models\Traits\SomelineHasImageablesTrait;
use Someline\Model\Foundation\User as BaseUser;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Someline\Notifications\ResetPasswordNotification;

class User extends BaseUser
{
    use EntrustUserTrait;
    use SomelineHasImageablesTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'gender', 'birthday', 'country', 'timezone', 'locale', 'username', 'phone_number', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Called when model is created
     * Other events available are in BaseModelEvents
     */
    public function onCreated()
    {
        parent::onCreated();

    }

    /**
     * 发送密码重置通知.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * 获取中教老师信息
     */
    public function cteacher()
    {
        return $this->hasOne('Someline\Models\User\Cteacher', 'user_id');
    }

}
