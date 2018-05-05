<?php
// +----------------------------------------------------------------------
// | ConsumerTrait.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\Clients\Kong;

trait PluginTrait
{
    /**
     * @desc   新增插件
     * @author limx
     * @param $params
     * @see    \App\Tasks\Kong\Plugins\AddTask
     */
    public function addPlugin($params)
    {
        return $this->post("/plugins/", [
            'json' => $params
        ]);
    }

    /**
     * @desc   更新消费者
     * @author limx
     * @param $idOrName
     * @param $params
     * @return mixed
     */
    public function updatePlugin($idOrName, $params)
    {
        unset($params['id']);
        return $this->patch("/consumers/{$idOrName}", [
            'json' => $params
        ]);
    }

    /**
     * @desc   获取消费者详情
     * @author limx
     * @param $idOrName
     * @return mixed
     * @see    \App\Tasks\Kong\Consumers\InfoTask
     */
    public function getPlugin($idOrName)
    {
        return $this->get("/consumers/{$idOrName}");
    }

    /**
     * @desc   消费者列表
     * @author limx
     * @param $params
     * @return mixed
     * @see    \App\Tasks\Kong\Plugins\ListTask
     */
    public function plugins($params = [])
    {
        return $this->get('/plugins/', [
            'json' => $params
        ]);
    }

    /**
     * @desc   删除消费者
     * @author limx
     * @param $idOrName
     * @return mixed
     */
    public function deletePlugin($idOrName)
    {
        return $this->delete("/consumers/{$idOrName}");
    }
}