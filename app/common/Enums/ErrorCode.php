<?php
// +----------------------------------------------------------------------
// | ErrorCode.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\Enums;

use Xin\Phalcon\Enum\Enum;

class ErrorCode extends Enum
{

    /**
     * @Message('系统错误')
     */
    public static $ENUM_SYSTEM_ERROR = 400;

    /**
     * @Message('参数错误')
     */
    public static $ENUM_PARAMS_ERROR = 401;

    /**
     * @Message('Kong接口报错')
     */
    public static $ENUM_KONG_API_FAIL = 402;

    /**
     * @Message('Kong节点不存在，请先配置节点信息')
     */
    public static $ENUM_KONG_NODES_NOT_EXIST = 1000;
}
