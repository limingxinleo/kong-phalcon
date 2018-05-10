<?php
// +----------------------------------------------------------------------
// | kong.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
return [
    'service' => [
        'params' => [
            'id' => 'The Service id.',
            'name' => 'The Service name.',
            'protocol' => 'The protocol used to communicate with the upstream. It can be one of http (default) or https.',
            'host' => 'The host of the upstream server.',
            'port' => 'The upstream server port. Defaults to 80.',
            'path' => 'The path to be used in requests to the upstream server. Empty by default.',
            'retries' => 'The number of retries to execute upon failure to proxy. The default is 5.',
            'connect_timeout' => 'The timeout in milliseconds for establishing a connection to the upstream server. Defaults to 60000.',
            'write_timeout' => 'The timeout in milliseconds between two successive write operations for transmitting a request to the upstream server. Defaults to 60000.',
            'read_timeout' => 'The timeout in milliseconds between two successive read operations for transmitting a request to the upstream server. Defaults to 60000.',
            'url' => 'Shorthand attribute to set protocol, host, port and path at once. This attribute is write-only (the Admin API never "returns" the url).',
        ]
    ]
];