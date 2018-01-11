<?php

namespace Someline\Models\User;

use Someline\Model\Foundation\User as BaseUser;

class Cteacher extends BaseUser
{

    protected $primaryKey = 'cteacher_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'updated_at', 'created_at', 'deleted_at',
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
     * 获取老师对应的用户
     */
    public function user()
    {
        return $this->belongsTo('Someline\Models\Foundation\User','user_id');
    }

}
