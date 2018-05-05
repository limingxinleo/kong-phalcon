<?php

namespace App\Tasks\Kong\Consumers;

use App\Common\Clients\KongClient;
use App\Tasks\Kong\KongTask;

class AddTask extends KongTask
{
    public $params = [
        'username' => 'The unique username of the consumer. You must send either this field or custom_id with the request.',
        'custom_id' => 'Field for storing an existing unique ID for the consumer - useful for mapping Kong with users in your existing database. You must send either this field or username with the request.'
    ];

    public function handle($params = [])
    {
        $client = KongClient::getInstance();
        $res = $client->addConsumer($params);
        $this->dump($res);
    }
}
