<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/5/7
 * Time: 下午4:22
 */

namespace App\Biz\Kong;

use App\Biz\Kong\WebSocket\Response;
use Phalcon\Di\FactoryDefault;
use swoole_websocket_server;

class WebSocket
{
    /** @var swoole_websocket_server */
    public $server;

    /** @var Response */
    public $response;

    /**
     * @return WebSocket
     */
    public static function getInstance()
    {
        return di('ws');
    }

    public function __construct(swoole_websocket_server $server)
    {
        $this->server = $server;
        $this->response = new Response($server);

        $di = FactoryDefault::getDefault();
        $di->setShared('ws', $this);
    }
}