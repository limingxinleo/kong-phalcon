<?php

namespace App\Tasks\Kong\Nodes;

use App\Common\Clients\KongClient;
use App\Models\Repository\Nodes;
use App\Tasks\Kong\KongTask;
use Xin\Cli\Color;

class StatusTask extends KongTask
{
    public function handle($params = [])
    {
        $nodes = Nodes::getInstance()->findAll();
        $clients = [];
        foreach ($nodes as $node) {
            $clients[] = KongClient::getInstance($node);
        }

        while (true) {
            $height = 1;
            echo Color::colorize('-------------------- KONG ------------------') . PHP_EOL;
            /** @var KongClient $client */
            foreach ($clients as $client) {
                $res = $client->status();
                echo Color::colorize('节点信息:' . $client->getNode()->url) . PHP_EOL;
                echo Color::colorize('总请求数:' . $res['server']['total_requests']) . PHP_EOL;
                echo Color::colorize('处理的请求数:' . $res['server']['connections_handled']) . PHP_EOL;
                echo Color::colorize('接受的请求数:' . $res['server']['connections_accepted']) . PHP_EOL;
                echo PHP_EOL;
                $height += 5;
            }

            echo "\033[{$height}A\033[1000D";
            sleep(5);
        }
    }
}

