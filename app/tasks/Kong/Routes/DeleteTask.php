<?php

namespace App\Tasks\Kong\Routes;

use App\Common\Clients\KongClient;
use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\BizException;
use App\Tasks\Kong\KongTask;
use App\Tasks\Task;

class DeleteTask extends KongTask
{
    public $params = [
        'id' => 'The Route id.',
    ];

    public function handle($params = [])
    {
        if (!isset($params['id'])) {
            throw new BizException(ErrorCode::$ENUM_KONG_ROUTE_ID_NOT_EXIST);
        }
        $id = $params['id'];
        $client = KongClient::getInstance();
        $res = $client->deleteRoute($id);
        $this->dump($res);
    }
}
