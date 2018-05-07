<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/5/7
 * Time: 下午3:48
 */

namespace App\Biz\Kong;

use Xin\Traits\Common\InstanceTrait;
use swoole_websocket_server;

class EventHandler
{
    use InstanceTrait;

    public function onWorkerStart(swoole_websocket_server $server, $workerId)
    {

    }

}