<?php
// +----------------------------------------------------------------------
// | KongClient.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\Clients;

use App\Common\Clients\Kong\ServiceTrait;
use Psr\Http\Message\ResponseInterface;
use Xin\Http\Rpc\Client;
use Xin\Http\Rpc\Exceptions\HttpException;
use Xin\Traits\Common\InstanceTrait;

class KongHandler extends Client
{
    // composer require limingxinleo/x-trait-common
    use InstanceTrait;
    use ServiceTrait;

    protected $baseUri = 'http://api.demo.phalcon.lmx0536.cn';

    public function __construct()
    {
        $config = di('configCenter')->get('kong');
        $this->baseUri = $config->host;
    }
}