<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/5/7
 * Time: 下午3:53
 */

namespace App\Biz\Kong;

use App\Common\Clients\KongClient;
use Xin\Traits\Common\InstanceTrait;

class MessageHandler
{
    use InstanceTrait;

    public function services($data)
    {
        return KongClient::getInstance()->services($data);
    }
}