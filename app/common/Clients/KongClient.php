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
 * @method addService($params = [])
 * @method services($params = [])
 * @method updateService($idOrName, $params)
 * @method getService($idOrName)
 * @method deleteService($idOrName)
 *
 * @method addRoute($params)
 * @method routes($params = [])
 * @method getRoute($id)
 * @method updateRoute($id, $params)
 * @method deleteRoute($id)
 *
 * @method addApi($params)
 * @method getApi($idOrName)
 * @method deleteApi($idOrName)
 * @method apis($params = [])
 * @method updateApi($idOrName, $params)
 *
 * @method addConsumer($params)
 * @method getConsumer($idOrName)
 * @method consumers($params = [])
 * @method updateConsumer($idOrName, $params)
 * @method deleteConsumer($idOrName)
 *
 * @method addPlugin($params)
 * @method plugins($params = [])
 * @method updatePlugin($id, $params)
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
            $body = $ex->getResponse()->getBody()->getContents();
            $json = json_decode($body, true);
            $message = Arr::get($json, 'message');
            if (empty($message)) $message = $body;
            throw new BizException(ErrorCode::$ENUM_KONG_API_FAIL, $message);
        }
    }
}
