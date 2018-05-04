<?php

namespace App\Tasks\Kong\Apis;

use App\Common\Clients\KongClient;
use App\Common\Clients\KongHandler;
use App\Tasks\Kong\KongTask;
use Xin\Cli\Color;

class ListTask extends KongTask
{
    public $params = [
        'offset' => 'A cursor used for pagination. offset is an object identifier that defines a place in the list.',
        'size' => 'A limit on the number of objects to be returned per page.',
    ];

    public function handle($params = [])
    {
        $client = KongClient::getInstance();
        $res = $client->apis($params);

        $total = $res['total'];
        $data = $res['data'];

        echo Color::colorize("total: {$total}", Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::head("data:") . PHP_EOL;
        $this->dump($data);
    }
}
