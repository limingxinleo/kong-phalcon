<?php
// +----------------------------------------------------------------------
// | KongClient.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\Clients;

use App\Common\Clients\Kong\ApiTrait;
use App\Common\Clients\Kong\ConsumerTrait;
use App\Common\Clients\Kong\PluginTrait;
use App\Common\Clients\Kong\RouteTrait;
use App\Common\Clients\Kong\ServiceTrait;
use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\BizException;
use App\Models\Repository\Nodes;
use Xin\Http\Rpc\Client;
use Xin\Traits\Common\InstanceTrait;

class KongHandler extends Client
{
    // composer require limingxinleo/x-trait-common
    use InstanceTrait;

    use ServiceTrait, RouteTrait, ApiTrait, ConsumerTrait, PluginTrait;

    public function status()
    {
        return $this->get('/status');
    }

    public function setBaseUri($uri)
    {
        $this->baseUri = $uri;
    }
}
