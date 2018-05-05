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
        echo Color::colorize('  nodes:add           新增节点', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo PHP_EOL;
        echo Color::colorize('  services:list       查看服务列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:add        新增服务', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:update     更新服务', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:info       服务详情', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:delete     删除服务', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo PHP_EOL;
        echo Color::colorize('  routes:list         路由列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  routes:add          新增路由', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  routes:update       更新路由', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  routes:info         路由详情', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  routes:delete       删除路由', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo PHP_EOL;
        echo Color::colorize('  apis:list           API列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  apis:add            新增API', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  apis:update         更新API', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  apis:info           API详情', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  apis:delete         删除API', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo PHP_EOL;
        echo Color::colorize('  consumers:add       新增消费者', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }
}
