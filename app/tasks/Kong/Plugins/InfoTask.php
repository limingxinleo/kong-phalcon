<?php

namespace App\Tasks\Kong\Plugins;

use App\Common\Clients\KongClient;
use App\Tasks\Kong\KongTask;
use App\Tasks\Task;

class InfoTask extends KongTask
{
    public $params = [
        'id' => 'The Plugin id.',
    ];

    public function handle($params = [])
    {
        $id = $this->getIdOrName();
        $client = KongClient::getInstance();
        $res = $client->getPlugin($id);
        $this->dump($res);
    }
}
