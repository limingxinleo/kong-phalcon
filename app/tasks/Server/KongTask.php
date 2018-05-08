<?php

namespace App\Tasks\Server;

use App\Biz\Kong\ConnectHandler;
use App\Biz\Kong\EventHandler;
use App\Biz\Kong\MessageHandler;
use App\Biz\Kong\WebSocket;
use App\Biz\Kong\ServerHandler;
use App\Biz\Kong\Workers\NodeStatus;
use App\Common\Enums\ErrorCode;
use App\Common\Enums\RedisCode;
use App\Common\Exceptions\BizException;
use App\Common\Exceptions\ExceptionInterface;
use App\Core\Cli\Task\WebSocket as BaseTask;
use App\Utils\Redis;
use swoole_process;
use swoole_http_request;
use swoole_websocket_frame;
use swoole_websocket_server;
use Xin\Cli\Color;

class KongTask extends BaseTask
{
    /** @var WebSocket */
    public $ws;

    public function onConstruct()
    {
        $this->port = env('KONG_WEBSOCKET_SERVER_PORT', 8002);
    }

    protected function beforeServerStart(swoole_websocket_server $server)
    {
        $server->on('workerStart', [EventHandler::getInstance(), 'onWorkerStart']);
        ServerHandler::getInstance()->handle($server);

        // 初始化Response
        $this->ws = new WebSocket($server);

        parent::beforeServerStart($server); // TODO: Change the autogenerated stub
    }

    public function connect(swoole_websocket_server $server, swoole_http_request $request)
    {
        ConnectHandler::getInstance()->handle($server, $request);
    }

    public function message(swoole_websocket_server $server, swoole_websocket_frame $frame)
    {
        $fd = $frame->fd;
        try {
            $handler = MessageHandler::getInstance();
            $data = json_decode($frame->data, true);
            if (empty($data) || !isset($data['id'])) {
                throw new BizException(ErrorCode::$ENUM_PARAMS_ERROR);
            }

            $id = $data['id'];
            $arguments = $data['data'];

            $result = $handler->$id($arguments, $frame);
            $this->ws->response->success($fd, $id, $result);
        } catch (\Exception $ex) {
            if ($ex instanceof ExceptionInterface) {
                $this->ws->response->fail($server, $fd, $ex->getCode(), $ex->getMessage());
            }
            $errMessage = "code:{$ex->getCode()}, message:{$ex->getMessage()}";
            echo Color::colorize($errMessage, Color::FG_LIGHT_RED) . PHP_EOL;
        }
    }

    public function close(swoole_websocket_server $ser, $fd)
    {
        // TODO: Implement close() method.
    }

    protected function getConfig()
    {
        $pidsDir = di('config')->application->pidsDir;
        return [
            'pid_file' => $pidsDir . 'socket.pid',
            'user' => 'nginx',
            'group' => 'nginx',
            'daemonize' => false,
            'max_request' => 500,
        ];
    }
}

