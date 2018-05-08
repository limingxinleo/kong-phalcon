<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/5/7
 * Time: 下午3:07
 */

namespace App\Common\Enums;

class RedisCode
{
    const KONG_WEBSOCKET_CLIENT_FDS = 'kong:websocket:client:fds';

    const KONG_NODES_STATUS = 'kong:nodes:status';

    const KONG_FD_TOKEN_MAPPER = 'kong:fd:%s:token';
}