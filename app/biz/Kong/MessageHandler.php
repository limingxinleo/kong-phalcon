<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/5/7
 * Time: 下午3:53
 */

namespace App\Biz\Kong;

use App\Biz\Auth\User;
use App\Common\Clients\KongClient;
use App\Common\Enums\RedisCode;
use App\Utils\Redis;
use Xin\Traits\Common\InstanceTrait;
use swoole_websocket_frame;

class MessageHandler
{
    use InstanceTrait;

    public function services($data)
    {
        return KongClient::getInstance()->services($data);
    }

    /**
     * @desc   初始化
     * @author limx
     * @param $data
     */
    public function init($data, swoole_websocket_frame $frame)
    {
        $token = $data['token'];

        $user = User::getInstance()->getUserCache($token);
        $fd = $frame->fd;

        $redisKey = sprintf(RedisCode::KONG_FD_TOKEN_MAPPER, $fd);
        Redis::set($redisKey, $token);
        return $user->toArray();
    }
}