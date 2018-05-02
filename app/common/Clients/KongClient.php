<?php
// +----------------------------------------------------------------------
// | KongClient.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\Clients;

use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\BizException;
use GuzzleHttp\Exception\ClientException;
use limx\Support\Arr;
use Xin\Traits\Common\InstanceTrait;

/**
 * Class KongClient
 * @package App\Common\Clients
 * @method addService($name, $url)
 * @method services()
 */
class KongClient
{
    // composer require limingxinleo/x-trait-common
    use InstanceTrait;

    protected $handler;

    public function __call($name, $arguments)
    {
        $handler = KongHandler::getInstance();
        try {
            return $handler->$name(...$arguments);
        } catch (ClientException $ex) {
            $json = json_decode($ex->getResponse()->getBody()->getContents(), true);
            $message = Arr::get($json, 'message');
            throw new BizException(ErrorCode::$ENUM_KONG_API_FAIL, $message);
        }
    }
}