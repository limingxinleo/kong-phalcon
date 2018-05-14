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
        echo Color::colorize('  nodes:status        节点状态', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo PHP_EOL;
        echo Color::colorize('  services:list       查看服务列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:add        新增服务', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:update     更新服务', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:info       服务详情', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:delete     删除服务', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  services:plugins    某服务的插件列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
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
        echo Color::colorize('  consumers:list      消费者列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  consumers:update    更新消费者', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  consumers:info      消费者详情', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  consumers:delete    删除消费者', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  consumers:basicAuth 消费者基础权限列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  consumers:addBasicAuth      为消费者增加基础权限', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  consumers:deleteBasicAuth   为消费者删除基础权限', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo PHP_EOL;
        echo Color::colorize('  plugins:add         新增插件', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  plugins:list        插件列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  plugins:update      更新插件', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  plugins:info        插件详情', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  plugins:delete      删除插件', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  plugins:enabled     可用的插件列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }
}
