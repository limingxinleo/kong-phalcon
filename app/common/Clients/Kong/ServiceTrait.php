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
     */
    public function addService($name, $url)
    {
        $params = [
            'name' => $name,
            'url' => $url
        ];
        return $this->post('/services/', [
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
}
