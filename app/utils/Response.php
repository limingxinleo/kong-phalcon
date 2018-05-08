<?php
// +----------------------------------------------------------------------
// | Response.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Utils;

use App\Common\Enums\ErrorCode;

class Response
{
    private static function response(array $data)
    {
        /** @var \Phalcon\Http\Response $response */
        $response = di('response');

        // 记录response日志
        static::log($data);

        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Headers', '*');

        return $response->setJsonContent($data);
    }

    private static function log(array $data)
    {
        /** @var \Phalcon\Http\RequestInterface $request */
        $request = di('request');
        $uri = $request->getURI();
        $params = Request::get();
        $result = $data;

        $msg = PHP_EOL;
        $msg .= '接口：' . $uri . PHP_EOL;
        $msg .= '参数：' . json_encode($params, JSON_UNESCAPED_UNICODE) . PHP_EOL;
        $msg .= '结果：' . json_encode($result, JSON_UNESCAPED_UNICODE) . PHP_EOL;
        /** @var Factory $factory */
        $factory = di('logger');
        $logger = $factory->getLogger('response');
        $logger->info($msg);
    }

    public static function success($data = null)
    {
        $result = [];
        $result['code'] = 0;
        if (isset($data)) {
            $result['data'] = $data;
        }
        return static::response($result);
    }

    public static function fail($code, $message = null)
    {
        // 避免出现第三方插件有错误码为0的情况
        if ($code === 0) {
            $code = ErrorCode::$ENUM_SYSTEM_ERROR;
        }
        if (empty($message)) {
            $message = ErrorCode::getMessage($code);
        }

        return static::response([
            'code' => $code,
            'message' => $message
        ]);
    }
}
