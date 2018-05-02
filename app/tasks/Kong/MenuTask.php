<?php

namespace App\Tasks\Kong;

use App\Tasks\Task;
use Xin\Cli\Color;

class MenuTask extends Task
{

    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  清理缓存信息') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run kong:action', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  services:list       查看服务列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:add        查看服务列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

}

