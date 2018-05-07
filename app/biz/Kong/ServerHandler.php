<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/5/7
 * Time: 下午3:21
 */

namespace App\Biz\Kong;

use App\Biz\Kong\Workers\Nodes;
use Xin\Traits\Common\InstanceTrait;
use swoole_websocket_server;
use swoole_process;

class ServerHandler
{
    use InstanceTrait;

    public function handle(swoole_websocket_server $server)
    {
        $process = new swoole_process(function ($process) use ($server) {
            while (true) {
                $status = Nodes::getInstance()->getStatus();
                foreach ($server->connections as $conn) {
                    $server->push($conn, json_encode($status));
                }

                sleep(10);
            }
        });

        $server->addProcess($process);
    }
}