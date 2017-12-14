<?php

namespace Someline\Models\Foundation;

use Zizaco\Entrust\EntrustPermission;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Permission extends EntrustPermission implements Transformable
{
    use TransformableTrait;

    protected $primaryKey = 'id';

    protected $guarded = [
        'update_at', 'update_by', 'delete_by', 'delete_at',
    ];

    // Fields to be converted to Carbon object automatically
    protected $dates = [];
}
