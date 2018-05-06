<?php

namespace App\Tasks\Kong\Plugins;

use App\Common\Clients\KongClient;
use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\BizException;
use Xin\Cli\Color;

class UpdateTask extends AddTask
{
    public function handle($params = [])
    {
        if (!isset($params['id'])) {
            throw new BizException(ErrorCode::$ENUM_KONG_PLUGIN_ID_REQUIRED);
        }
        $id = $params['id'];

        $client = KongClient::getInstance();
        $res = $client->updatePlugin($id, $params);
        $this->dump($res);
    }
}
