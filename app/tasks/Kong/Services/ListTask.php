<?php

namespace App\Tasks\Kong\Services;

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
        $res = $client->services($params);

        $next = $res['next'];
        $data = $res['data'];

        echo Color::colorize("next: {$next}", Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::head("data:") . PHP_EOL;
        foreach ($data as $item) {
            foreach ($item as $key => $val) {
                echo Color::colorize("{$key}: {$val}", Color::FG_LIGHT_GREEN) . PHP_EOL;
            }
            echo PHP_EOL;
        }
    }
}

