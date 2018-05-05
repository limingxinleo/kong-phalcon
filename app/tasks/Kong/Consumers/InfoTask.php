<?php

namespace App\Tasks\Kong\Consumers;

use App\Common\Clients\KongClient;
use App\Tasks\Kong\KongTask;
use App\Tasks\Task;

class InfoTask extends KongTask
{
    public $params = [
        'id' => 'The Consumer id.',
        'name' => 'The Consumer username.',
    ];

    public function handle($params = [])
    {
        $id = $this->getIdOrName();
        $client = KongClient::getInstance();
        $res = $client->getConsumer($id);
        $this->dump($res);
    }
}
