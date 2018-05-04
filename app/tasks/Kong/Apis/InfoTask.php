<?php

namespace App\Tasks\Kong\Apis;

use App\Common\Clients\KongClient;
use App\Tasks\Kong\KongTask;

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
        $res = $client->getApi($id);
        $this->dump($res);
    }
}
