<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/5/7
 * Time: 下午4:22
 */

namespace App\Biz\Kong;

use Xin\Traits\Common\InstanceTrait;
use swoole_websocket_server;

class WebSocket
{
    use InstanceTrait;

    /** @var swoole_websocket_server */
    public $server;

    /**
     * 发送消息
     * @param $fd   目标fd
     * @param $pid  接口名
     * @param $data 接口数据
     */
    public function success($fd, $id, $data)
    {
        $result = json_encode([
            'id' => $id,
            'data' => $data
        ]);

        return $this->server->push($fd, $result);
    }

    /**
     * 发送失败消息
     * @param $fd      目标fd
     * @param $pid     接口
     * @param $code    错误码
     * @param $message 错误信息
     */
    public function fail($fd, $code, $message)
    {
        $result = json_encode([
            'code' => $code,
            'message' => $message
        ]);

        return $this->server->push($fd, $result);
    }
}