<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/5/7
 * Time: 下午3:21
 */

namespace App\Biz\Kong;

use App\Biz\Kong\Workers\NodeStatus;
use Xin\Traits\Common\InstanceTrait;
use swoole_websocket_server;
use swoole_process;

class ServerHandler
{
    use InstanceTrait;

    public function handle(swoole_websocket_server $server)
    {
        // 用于刷新节点状态
        $process = new swoole_process(function ($process) use ($server) {
            while (true) {
                NodeStatus::getInstance()->refresh();
                sleep(10);
            }
        });
        $server->addProcess($process);

        // 用于群发节点状态
        $process = new swoole_process(function ($process) use ($server) {
            while (true) {
                $result = NodeStatus::getInstance()->get();
                foreach ($server->connections as $fd) {
                    Response::getInstance()->success($fd, 'status', $result);
                }
                sleep(30);
            }
        });
        $server->addProcess($process);
    }
}