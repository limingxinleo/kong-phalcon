<?php
// +----------------------------------------------------------------------
// | WebSocketUser.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Biz\Auth;

use App\Biz\Base;
use App\Common\Enums\RedisCode;
use App\Common\Exceptions\BizException;
use App\Common\Enums\ErrorCode;
use App\Models\User as UserModel;
use App\Utils\Redis;
use Phalcon\Text;

class WebSocketUser extends Base
{
    public function getUserByFd($fd)
    {
        $redisKey = sprintf(RedisCode::KONG_FD_TOKEN_MAPPER, $fd);
        $token = Redis::get($redisKey);
        if (empty($token)) {
            throw new BizException(ErrorCode::$ENUM_WEBSOCKET_ILLEGAL_REQUEST);
        }
        return User::getInstance()->getUserCache($token);
    }

    public function hasAuth($fd)
    {
        $redisKey = sprintf(RedisCode::KONG_FD_TOKEN_MAPPER, $fd);
        $token = Redis::get($redisKey);
        if (empty($token)) {
            return false;
        }
        return true;
    }
}