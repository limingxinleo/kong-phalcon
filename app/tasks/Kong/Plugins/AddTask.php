<?php

namespace App\Tasks\Kong\Plugins;

use App\Common\Clients\KongClient;
use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\BizException;
use App\Tasks\Kong\KongTask;
use limx\Support\Arr;
use Xin\Cli\Color;

class AddTask extends KongTask
{
    public function handle($params = [])
    {
        $client = KongClient::getInstance();
        $res = $client->addPlugin($params);
        $this->dump($res);
    }

    protected function getParams()
    {
        $name = $this->argument('name');
        if (empty($name)) {
            throw new BizException(ErrorCode::$ENUM_KONG_PLUGIN_NAME_REQUIRED);
        }

        $params = [];
        $config = di('configCenter')->get('kong_plugins')->toArray();
        if (!isset($config[$name])) {
            throw new BizException(ErrorCode::$ENUM_KONG_PLUGIN_NAME_NOT_EXIST);
        }

        foreach ($config[$name] as $key => $desc) {
            if ($data = $this->argument($key)) {
                $params[$key] = $data;
            }
        }

        return Arr::dot2Array($params);
    }

    protected function help()
    {
        $name = $this->argument('name');
        if (empty($name)) {
            throw new BizException(ErrorCode::$ENUM_KONG_PLUGIN_NAME_REQUIRED);
        }

        $params = [];
        $config = di('configCenter')->get('kong_plugins')->toArray();
        if (!isset($config[$name])) {
            throw new BizException(ErrorCode::$ENUM_KONG_PLUGIN_NAME_NOT_EXIST);
        }

        echo Color::head('参数信息:') . PHP_EOL;
        foreach ($config[$name] as $key => $desc) {
            echo Color::colorize("  {$key}: ", Color::FG_LIGHT_RED);
            echo Color::colorize("{$desc}", Color::FG_LIGHT_GREEN) . PHP_EOL;
        }
    }

}

