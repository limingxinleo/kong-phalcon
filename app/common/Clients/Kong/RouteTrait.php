<?php
// +----------------------------------------------------------------------
// | RouteTrait.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\Clients\Kong;

trait RouteTrait
{
    /**
     * @desc   查看某Route的服务信息
     * @author limx
     * @param $routeId
     * @return mixed
     */
    public function getRouteService($routeId)
    {
        return $this->post("/routes/{$routeId}/service");
    }

    /**
     * @desc   新增路由
     * @author limx
     * @param $params
     */
    public function addRoute($params)
    {
        if (isset($params['methods']) && !is_array($params['methods'])) {
            $params['methods'] = [$params['methods']];
        }

        if (isset($params['paths']) && !is_array($params['paths'])) {
            $params['paths'] = [$params['paths']];
        }

        return $this->post("/routes/", [
            'json' => $params
        ]);
    }

    /**
     * @desc   路由列表
     * @author limx
     * @params offset
     * @params size
     * @return mixed
     */
    public function routes($params = [])
    {
        return $this->get('/routes/', [
            'json' => $params
        ]);
    }

    /**
     * @desc   路由详情
     * @author limx
     * @param $id
     */
    public function getRoute($id)
    {
        return $this->get("/routes/{$id}");
    }
}
