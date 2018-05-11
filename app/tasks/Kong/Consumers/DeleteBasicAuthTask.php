<?php

namespace App\Tasks\Kong\Consumers;

use App\Common\Clients\KongClient;
use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\BizException;
use App\Tasks\Kong\KongTask;

/**
 * Class DeleteBasicAuthTask
 * @package App\Tasks\Kong\Consumers
 */
class DeleteBasicAuthTask extends KongTask
{

    public $params = [
        'id' => 'The consumer id.',
        'name' => 'The consumer username.',
        'target_id' => 'The target id.'
    ];

    public function handle($params = [])
    {
        $id = $this->getIdOrName();
        if (!isset($id) || !isset($params['target_id'])) {
            throw new BizException(ErrorCode::$ENUM_KONG_CONSUMER_ID_OR_USERNAME_NOT_EXIST);
        }

        $client = KongClient::getInstance();
        $res = $client->deleteConsumerBasicAuth($id, $params['target_id']);
        $this->dump($res);
    }
}

