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
        'updated_at', 'updated_by', 'deleted_by', 'deleted_at',
    ];

    // Fields to be converted to Carbon object automatically
    protected $dates = [];
}
