<?php

namespace App\Tasks\Kong\Apis;

use App\Common\Clients\KongClient;
use App\Tasks\Kong\KongTask;
use App\Tasks\Task;

class DeleteTask extends KongTask
{
    public $params = [
        'id' => 'The Service id.',
        'name' => 'The Service name.',
    ];

    public function handle($params = [])
    {
        $id = $this->getIdOrName();
        $client = KongClient::getInstance();
        $res = $client->deleteApi($id);
        $this->dump($res);
    }
}
