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
use App\Models\Repository\Nodes;
use GuzzleHttp\Exception\ClientException;
use limx\Support\Arr;
use Xin\Traits\Common\InstanceTrait;

/**
 * Class KongClient
 * @package App\Common\Clients
 *
 * @method status()
 *
 * @method addService($params = [])
 * @method services($params = [])
 * @method updateService($idOrName, $params)
 * @method getService($idOrName)
 * @method deleteService($idOrName)
 * @method pluginsByService($idOrName)
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
 * @method updateConsumerBasicAuth($idOrUserName, $params)
 * @method getConsumerBasicAuth($idOrUserName)
 * @method deleteConsumerBasicAuth($idOrUserName, $targetId)
 *
 * @method addPlugin($params)
 * @method plugins($params = [])
 * @method updatePlugin($id, $params)
 * @method getPlugin($id)
 * @method deletePlugin($idOrName)
 */
class KongClient
{
    /** @var \App\Models\Nodes */
    protected $node;

    protected static $_instances = [];

    public static function getInstance($node = null)
    {
        if (!isset($node)) {
            $node = Nodes::getInstance()->findFirst();
        }

        if (isset(static::$_instances[$node->id]) && static::$_instances[$node->id] instanceof static) {
            return static::$_instances[$node->id];
        }

        $client = new static();
        $client->node = $node;
        return static::$_instances[$node->id] = $client;
    }

    public function __call($name, $arguments)
    {
        $handler = KongHandler::getInstance();
        $handler->setBaseUri($this->node->url);
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

    /**
     * @return \App\Models\Nodes
     */
    public function getNode()
    {
        return $this->node;
    }
}
