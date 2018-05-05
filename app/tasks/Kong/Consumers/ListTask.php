<?php

namespace App\Tasks\Kong\Consumers;

use App\Common\Clients\KongClient;
use App\Tasks\Kong\KongTask;
use Xin\Cli\Color;

class ListTask extends KongTask
{
    public $params = [
        'id' => 'A filter on the list based on the consumer id field.',
        'custom_id' => 'A filter on the list based on the consumer custom_id field.',
        'username' => 'A filter on the list based on the consumer username field.',
        'offset' => 'A cursor used for pagination. offset is an object identifier that defines a place in the list.',
        'size' => 'A limit on the number of objects to be returned.',
    ];

    public function handle($params = [])
    {
        $client = KongClient::getInstance();
        $res = $client->consumers($params);

        $total = $res['total'];
        $data = $res['data'];

        echo Color::colorize("total: {$total}", Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::head("data:") . PHP_EOL;
        $this->dump($data);
    }
}
