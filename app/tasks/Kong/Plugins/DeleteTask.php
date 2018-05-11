<?php

namespace App\Tasks\Kong\Plugins;

use App\Common\Clients\KongClient;
use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\BizException;
use App\Tasks\Kong\KongTask;
use App\Tasks\Task;

class DeleteTask extends KongTask
{
    public $params = [
        'id' => 'The Plugin id.',
    ];

    public function handle($params = [])
    {
        if(!isset($params['id'])){
            throw new BizException(ErrorCode::$ENUM_KONG_PLUGIN_ID_REQUIRED);
        }
        $client = KongClient::getInstance();
        $res = $client->deletePlugin($params['id']);
        $this->dump($res);
    }
}
