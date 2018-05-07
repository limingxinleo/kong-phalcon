<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/5/7
 * Time: 下午3:01
 */

namespace App\Biz\Kong;

use App\Common\Enums\RedisCode;
use App\Utils\Redis;
use Xin\Traits\Common\InstanceTrait;
use swoole_websocket_server;
use swoole_http_request;

class ConnectHandler
{
    use InstanceTrait;

    public function handle(swoole_websocket_server $server, swoole_http_request $request)
    {

    }

}