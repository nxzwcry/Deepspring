<?php
/**
 * Created by PhpStorm.
 * User: nxzwc
 * Date: 2018/1/4
 * Time: 16:46
 */

namespace Someline\Http\Controllers\Wechat;

use Someline\Http\Controllers\BaseController;
use Log;

class WeChatController extends BaseController
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "欢迎关注 overtrue！";
        });

        return $app->server->serve();
    }
}