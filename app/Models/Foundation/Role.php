<?php

namespace Someline\Models\Foundation;

use Zizaco\Entrust\EntrustRole;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Role extends EntrustRole implements Transformable
{
    use TransformableTrait;

    protected $primaryKey = 'id';

    protected $guarded = [
        'update_at', 'update_by', 'delete_by', 'delete_at',
    ];

    // Fields to be converted to Carbon object automatically
    protected $dates = [];
}
