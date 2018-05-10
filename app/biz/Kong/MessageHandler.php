<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/5/7
 * Time: 下午3:53
 */

namespace App\Biz\Kong;

use App\Biz\Auth\User;
use App\Biz\Kong\Workers\NodeStatus;
use App\Common\Clients\KongClient;
use App\Common\Enums\ErrorCode;
use App\Common\Enums\RedisCode;
use App\Common\Exceptions\BizException;
use App\Utils\Redis;
use limx\Support\Arr;
use Xin\Traits\Common\InstanceTrait;
use swoole_websocket_frame;

class MessageHandler
{
    use InstanceTrait;

    /**
     * @desc   节点状态
     * @author limx
     * @param $data
     * @return array|mixed
     */
    public function status($data)
    {
        return NodeStatus::getInstance()->get();
    }

    /**
     * @desc   服务列表
     * @author limx
     * @param $data
     * @return mixed
     */
    public function services($data)
    {
        $res = KongClient::getInstance()->services($data);
        foreach ($res['data'] as $key => $item) {
            $res['data'][$key]['created_date'] = date('Y-m-d H:i:s', $item['created_at']);
            $res['data'][$key]['updated_date'] = date('Y-m-d H:i:s', $item['updated_at']);
        }
        return $res;
    }

    public function routes($data)
    {
        $res = KongClient::getInstance()->routes($data);
        foreach ($res['data'] as $key => $item) {
            $res['data'][$key]['created_date'] = date('Y-m-d H:i:s', $item['created_at']);
            $res['data'][$key]['updated_date'] = date('Y-m-d H:i:s', $item['updated_at']);
        }
        return $res;
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

    /**
     * @desc   更新服务
     * @author limx
     * @param  $data
     * @return mixed
     */
    public function upsertService($data, swoole_websocket_frame $frame)
    {
        $id = Arr::pull($data, 'id');
        if ($id) {
            $mapper = di('configCenter')->get('kong')->service->params->toArray();
            $data = get_kong_params($data, $mapper);
            return KongClient::getInstance()->updateService($id, $data);
        }
        return KongClient::getInstance()->addService($data);
    }

    /**
     * @desc   删除服务
     * @author limx
     * @param $data
     */
    public function deleteService($data, swoole_websocket_frame $frame)
    {
        if (!isset($data['id'])) {
            throw new BizException(ErrorCode::$ENUM_KONG_SERVICE_ID_OR_NAME_NOT_EXIST);
        }

        $id = $data['id'];
        return KongClient::getInstance()->deleteService($id);
    }
}