<?php

namespace App\Tasks\Kong\Nodes;

use App\Models\Repository\Nodes;
use App\Tasks\Kong\KongTask;
use Xin\Cli\Color;

class AddTask extends KongTask
{
    public $params = [
        'name' => '节点名称',
        'url' => '节点地址',
    ];

    public function handle($params = [])
    {
        $name = $params['name'];
        $url = $params['url'];

        $res = Nodes::getInstance()->insert($name, $url);
        if ($res) {
            echo Color::success('节点添加成功！');
        }
    }
}

