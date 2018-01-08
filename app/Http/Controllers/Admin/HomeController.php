<?php

namespace Someline\Http\Controllers\admin;

use Someline\Http\Controllers\BaseController;

class HomeController extends BaseController
{

    public function getHomeExample()
    {
        return view('app.admin.home');
    }

}