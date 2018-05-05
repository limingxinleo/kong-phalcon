<?php

namespace App\Tasks\Kong\Plugins;

use App\Common\Clients\KongClient;
use App\Tasks\Kong\KongTask;
use Xin\Cli\Color;

class ListTask extends KongTask
{
    public $params = [
        'id' => 'A filter on the list based on the id field.',
        'name' => 'A filter on the list based on the name field.',
        'service_id' => 'A filter on the list based on the service_id field.',
        'route_id' => 'A filter on the list based on the route_id field.',
        'consumer_id' => 'A filter on the list based on the consumer_id field.',
        'offset' => 'A cursor used for pagination. offset is an object identifier that defines a place in the list.',
        'size' => 'A limit on the number of objects to be returned.',
    ];

    public function handle($params = [])
    {
        $client = KongClient::getInstance();
        $res = $client->plugins($params);

        $total = $res['total'];
        $data = $res['data'];

        echo Color::colorize("total: {$total}", Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::head("data:") . PHP_EOL;
        $this->dump($data);
    }
}
