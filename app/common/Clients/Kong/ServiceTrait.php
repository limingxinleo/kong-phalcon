<?php
// +----------------------------------------------------------------------
// | ServiceTrait.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\Clients\Kong;

trait ServiceTrait
{
    /**
     * @desc   新增Service
     * @author limx
     * @param $params
     * @return mixed
     * @see    \App\Tasks\Kong\Services\AddTask
     */
    public function addService($params)
    {
        return $this->post('/services/', [
            'form_params' => $params
        ]);
    }

    /**
     * @desc   更新服务
     * @author limx
     * @param $idOrName The service id or name
     * @param $params
     * @return mixed
     * @see    \App\Tasks\Kong\Services\UpdateTask
     */
    public function updateService($idOrName, $params)
    {
        unset($params['id']);
        return $this->patch("/services/{$idOrName}", [
            'form_params' => $params
        ]);
    }

    /**
     * @desc   服务列表
     * @author limx
     * @params offset
     * @params size
     * @return mixed
     */
    public function services($params = [])
    {
        return $this->get('/services/', [
            'form_params' => $params
        ]);
    }

    /**
     * @desc   某服务的插件列表
     * @author limx
     * @params $idOrName
     * @return mixed
     */
    public function pluginsByService($idOrName)
    {
        return $this->get("/services/{$idOrName}/plugins");
    }

    /**
     * @desc   获取服务详情
     * @author limx
     * @param $idOrName
     * @return mixed
     * @see    \App\Tasks\Kong\Services\InfoTask
     */
    public function getService($idOrName)
    {
        return $this->get("/services/{$idOrName}");
    }

    /**
     * @desc   删除服务
     * @author limx
     * @param $idOrName
     * @return mixed
     * @see    \App\Tasks\Kong\Services\DeleteTask
     */
    public function deleteService($idOrName)
    {
        return $this->delete("/services/{$idOrName}");
    }
}
