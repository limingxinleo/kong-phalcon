<?php
// +----------------------------------------------------------------------
// | ApiTrait.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\Clients\Kong;

trait ApiTrait
{
    /**
     * @desc   新增API
     * @author limx
     * @param $params
     * @see    \App\Tasks\Kong\Apis\AddTask
     */
    public function addApi($params)
    {
        return $this->post("/apis/", [
            'json' => $params
        ]);
    }

    /**
     * @desc   获取API详情
     * @author limx
     * @param $idOrName
     * @return mixed
     * @see    \App\Tasks\Kong\Apis\InfoTask
     */
    public function getApi($idOrName)
    {
        return $this->get("/apis/{$idOrName}");
    }

    /**
     * @desc   删除API
     * @author limx
     * @param $idOrName
     */
    public function deleteApi($idOrName)
    {
        return $this->delete("/apis/{$idOrName}");
    }

    /**
     * @desc   API列表
     * @author limx
     * @params offset
     * @params size
     * @return mixed
     */
    public function apis($params = [])
    {
        return $this->get('/apis/', [
            'json' => $params
        ]);
    }

    /**
     * @desc   更新API
     * @author limx
     * @param $idOrName The service id or name
     * @param $params
     * @return mixed
     * @see    \App\Tasks\Kong\Apis\UpdateTask
     */
    public function updateApi($idOrName, $params)
    {
        unset($params['id']);
        return $this->patch("/apis/{$idOrName}", [
            'json' => $params
        ]);
    }
}
