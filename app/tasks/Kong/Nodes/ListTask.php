<?php

namespace App\Tasks\Kong\Nodes;

use App\Models\Repository\Nodes;
use App\Tasks\Kong\KongTask;
use Xin\Cli\Color;

class ListTask extends KongTask
{
    public $params = [];

    public function handle($params = [])
    {
        $nodes = Nodes::getInstance()->findAll();
        if (count($nodes) === 0) {
            echo Color::colorize('您还没有配置任何节点', Color::FG_LIGHT_GREEN) . PHP_EOL;
            return;
        }

        /** @var \App\Models\Nodes $node */
        foreach ($nodes as $node) {
            echo Color::colorize("节点名: {$node->name}", Color::FG_LIGHT_GREEN) . PHP_EOL;
            echo Color::colorize("节点地址: {$node->url}", Color::FG_LIGHT_GREEN) . PHP_EOL;
        }
    }
}
