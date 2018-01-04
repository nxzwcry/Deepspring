<?php
/**
 * Created by PhpStorm.
 * User: nxzwc
 * Date: 2017/12/14
 * Time: 17:49
 */

namespace Someline\Observers;

use Someline\Models\Foundation\Role;

class PermissionObserver {

    public function created($permission)
    {
        // I want to create the $book book, but first...

        $admin = Role::where('name', 'admin')->first();
        $admin->attachPermission($permission);

    }

    public function saving($permission)
    {
        // I want to save the $book book, but first...
    }

    public function saved($permission)
    {
        // I just saved the $book book, so....
    }

}