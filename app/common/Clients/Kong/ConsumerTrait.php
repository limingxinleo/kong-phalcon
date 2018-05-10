<?php
// +----------------------------------------------------------------------
// | ConsumerTrait.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\Clients\Kong;

trait ConsumerTrait
{
    /**
     * @desc   新增消费者
     * @author limx
     * @param $params
     * @see    \App\Tasks\Kong\Consumers\AddTask
     */
    public function addConsumer($params)
    {
        return $this->post("/consumers/", [
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
    public function updateConsumer($idOrName, $params)
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
    public function getConsumer($idOrName)
    {
        return $this->get("/consumers/{$idOrName}");
    }

    /**
     * @desc   消费者列表
     * @author limx
     * @param $params
     * @return mixed
     * @see    \App\Tasks\Kong\Consumers\ListTask
     */
    public function consumers($params = [])
    {
        return $this->get('/consumers/', [
            'json' => $params
        ]);
    }

    /**
     * @desc   删除消费者
     * @author limx
     * @param $idOrName
     * @return mixed
     */
    public function deleteConsumer($idOrName)
    {
        return $this->delete("/consumers/{$idOrName}");
    }

    /**
     * @desc   更新消费者权限用户名与密码
     * @author limx
     * @param $consumerId
     */
    public function updateConsumerBasicAuth($idOrUserName, $params)
    {
        unset($params['id']);
        return $this->post("/consumers/{$idOrUserName}/basic-auth", [
            'json' => $params
        ]);
    }
}