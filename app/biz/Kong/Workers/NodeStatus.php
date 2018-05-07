<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/5/7
 * Time: 下午2:46
 */

namespace App\Biz\Kong\Workers;

use App\Common\Clients\KongClient;
use App\Common\Enums\RedisCode;
use App\Utils\Redis;
use Xin\Traits\Common\InstanceTrait;
use App\Models\Repository\Nodes as NodeRepository;

class NodeStatus
{
    use InstanceTrait;

    public function get()
    {
        $key = 'kong:nodes:status';
        $res = Redis::get($key);
        if (empty($res)) {
            return [];
        }
        return json_decode($res, true);
    }

    public function refresh()
    {
        $nodes = NodeRepository::getInstance()->findAll();
        $clients = [];
        foreach ($nodes as $node) {
            $clients[] = KongClient::getInstance($node);
        }

        $results = [];
        /** @var KongClient $client */
        foreach ($clients as $client) {
            $result = $client->status();
            $result['node'] = $client->getNode()->toArray();
            $results[] = $result;
        }

        Redis::set(RedisCode::KONG_NODES_STATUS, json_encode($results), 60);
        return $results;
    }
}