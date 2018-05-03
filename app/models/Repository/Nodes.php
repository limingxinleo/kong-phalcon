<?php
// +----------------------------------------------------------------------
// | Nodes.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Models\Repository;

use Xin\Traits\Common\InstanceTrait;
use App\Models\Nodes as NodeModel;

class Nodes
{
    use InstanceTrait;

    public function findAll()
    {
        return NodeModel::find();
    }

    public function findFirst()
    {
        return NodeModel::findFirst();
    }

    public function insert($name, $url)
    {
        $node = new NodeModel();
        $node->name = $name;
        $node->url = $url;
        return $node->save();
    }
}