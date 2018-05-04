<?php

namespace App\Tasks;

use Xin\Cli\Color;

class KongTask extends Task
{

    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  清理缓存信息') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run kong:action', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  nodes:list          查看节点列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:list       查看服务列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:add        新增服务', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:update     更新服务', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:info       服务详情', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

}

