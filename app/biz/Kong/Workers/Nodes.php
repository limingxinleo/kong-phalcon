<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/5/7
 * Time: 下午2:46
 */

namespace App\Biz\Kong\Workers;

use App\Common\Clients\KongClient;
use App\Utils\Redis;
use Xin\Traits\Common\InstanceTrait;
use App\Models\Repository\Nodes as NodeRepository;

class Nodes
{
    use InstanceTrait;

    public function getStatus()
    {
        $key = 'kong:nodes:status';
        if ($res = Redis::get($key)) {
            return json_decode($res, true);
        }

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

        Redis::set($key, json_encode($results), 60);
        return $results;
    }
}