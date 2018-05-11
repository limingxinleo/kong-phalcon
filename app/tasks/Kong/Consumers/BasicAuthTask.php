<?php

namespace App\Tasks\Kong\Consumers;

use App\Common\Clients\KongClient;
use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\BizException;
use App\Tasks\Kong\KongTask;

/**
 * Class UpdateBasicAuthTask
 * @package App\Tasks\Kong\Consumers
 */
class BasicAuthTask extends KongTask
{
    public $params = [
        'id' => 'The consumer id.',
        'name' => 'The consumer username.'
    ];

    public function handle($params = [])
    {
        $id = $this->getIdOrName();
        if (!isset($id)) {
            throw new BizException(ErrorCode::$ENUM_KONG_CONSUMER_ID_OR_USERNAME_NOT_EXIST);
        }

        $client = KongClient::getInstance();
        $res = $client->getConsumerBasicAuth($id);
        $this->dump($res);
    }
}

