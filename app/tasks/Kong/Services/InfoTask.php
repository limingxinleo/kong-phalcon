<?php

namespace App\Tasks\Kong\Services;

use App\Common\Clients\KongClient;
use App\Tasks\Kong\KongTask;
use App\Tasks\Task;

class InfoTask extends KongTask
{
    public $params = [
        'id' => 'The Service id.',
        'name' => 'The Service name.',
    ];

    public function handle($params = [])
    {
        $id = $this->getIdOrName();
        $client = KongClient::getInstance();
        $res = $client->getService($id);
        $this->dump($res);
    }


}

