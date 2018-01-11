<?php

namespace Someline\Http\Controllers\Admin;

use Someline\Http\Controllers\BaseController;

class UserController extends BaseController
{

    public function getUserList()
    {
        return view('app.admin.user.user_list');
    }

    public function getRoleList()
    {
        return view('app.admin.user.roles_list');
    }


}