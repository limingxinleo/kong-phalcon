<?php

namespace App\Tasks\Kong\Plugins;

use App\Common\Clients\KongClient;
use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\BizException;
use App\Tasks\Kong\KongTask;
use App\Tasks\Task;

class EnabledTask extends KongTask
{
    public $params = [];

    public function handle($params = [])
    {
        $client = KongClient::getInstance();
        $res = $client->enabledPlugins();
        $this->dump($res);
    }
}
