<?php

namespace App\Tasks\Kong\Consumers;

use App\Common\Clients\KongClient;
use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\BizException;
use App\Tasks\Kong\KongTask;

class UpdateTask extends KongTask
{
    public $params = [
        'id' => 'The consumer id.',
        'username' => 'The unique username of the consumer. You must send either this field or custom_id with the request.',
        'custom_id' => 'Field for storing an existing unique ID for the consumer - useful for mapping Kong with users in your existing database. You must send either this field or username with the request.'
    ];

    public function handle($params = [])
    {
        if (isset($params['id'])) {
            $idOrName = $params['id'];
        } else if (isset($params['username'])) {
            $idOrName = $params['username'];
        } else {
            throw new BizException(ErrorCode::$ENUM_KONG_CONSUMER_ID_OR_USERNAME_NOT_EXIST);
        }

        $client = KongClient::getInstance();
        $res = $client->updateConsumer($idOrName, $params);
        $this->dump($res);
    }
}
