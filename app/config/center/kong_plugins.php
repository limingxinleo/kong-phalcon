<?php
// +----------------------------------------------------------------------
// | kong_plugins.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
return [
    'rate-limiting' => [
        'name' => 'The name of the plugin to use, in this case rate-limiting',
        'api_id' => 'The id of the API which this plugin will target.',
        'service_id' => 'The id of the Service which this plugin will target.',
        'route_id' => 'The id of the Route which this plugin will target.',
        'consumer_id' => 'The id of the Consumer which this plugin will target.',
        'config.second' => 'The amount of HTTP requests the developer can make per second. At least one limit must exist.',
        'config.minute' => 'The amount of HTTP requests the developer can make per minute. At least one limit must exist.',
    ],
];