<?php

namespace App\Tasks\Server;

use App\Core\Cli\Task\WebSocket;
use swoole_http_request;
use swoole_websocket_frame;
use swoole_websocket_server;

class KongTask extends WebSocket
{
    public function onConstruct()
    {
        $this->port = env('KONG_WEBSOCKET_SERVER_PORT', 8002);
    }

    public function connect(swoole_websocket_server $server, swoole_http_request $request)
    {
        // TODO: Implement connect() method.
    }

    public function message(swoole_websocket_server $server, swoole_websocket_frame $frame)
    {
        // TODO: Implement message() method.
    }

    public function close(swoole_websocket_server $ser, $fd)
    {
        // TODO: Implement close() method.
    }
}

