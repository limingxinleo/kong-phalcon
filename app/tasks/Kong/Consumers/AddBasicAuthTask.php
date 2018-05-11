<?php

namespace App\Tasks\Kong\Consumers;

use App\Common\Clients\KongClient;
use App\Tasks\Kong\KongTask;

/**
 * Class UpdateBasicAuthTask
 * @package App\Tasks\Kong\Consumers
 * @help    username=limx password=910123 ===> authroization:base64_encode('limx:910123') ====> bGlteDo5MTAxMjM=
 * @help    curl -X POST http://api.coding.lmx0536.cn/demo -H 'Authorization: Basic bGlteDo5MTAxMjM=' 即可
 */
class AddBasicAuthTask extends KongTask
{

    public $params = [
        'id' => 'The consumer id.',
        'name' => 'The consumer username.',
        'username' => 'The username to use in the Basic Authentication.',
        'password' => 'The password to use in the Basic Authentication.'
    ];

    public function handle($params = [])
    {
        $id = $this->getIdOrName();
        if (!isset($id)) {
            throw new BizException(ErrorCode::$ENUM_KONG_CONSUMER_ID_OR_USERNAME_NOT_EXIST);
        }

        $client = KongClient::getInstance();
        $res = $client->updateConsumerBasicAuth($id, $params);
        $this->dump($res);
    }
}

