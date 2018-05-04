<?php

namespace App\Tasks\Kong\Routes;

use App\Common\Clients\KongClient;
use App\Tasks\Kong\KongTask;

class UpdateTask extends KongTask
{
    public $params = [
        'id' => 'The route id.',
        'protocols' => 'A list of the protocols this Route should allow. By default it is ["http", "https"], which means that the Route accepts both. When set to ["https"], HTTP requests are answered with a request to upgrade to HTTPS. With form-encoded, the notation is protocols[]=http&protocols[]=https. With JSON, use an Array.',
        'methods' => 'A list of HTTP methods that match this Route. For example: ["GET", "POST"]. At least one of hosts, paths, or methods must be set. With form-encoded, the notation is methods[]=GET&methods[]=OPTIONS. With JSON, use an Array.',
        'hosts' => 'A list of domain names that match this Route. For example: example.com. At least one of hosts, paths, or methods must be set. With form-encoded, the notation is hosts[]=foo.com&hosts[]=bar.com. With JSON, use an Array.',
        'paths' => 'A list of paths that match this Route. For example: /my-path. At least one of hosts, paths, or methods must be set. With form-encoded, the notation is paths[]=/foo&paths[]=/bar. With JSON, use an Array.',
        'strip_path' => 'When matching a Route via one of the paths, strip the matching prefix from the upstream request URL. Defaults to true.',
        'preserve_host' => 'When matching a Route via one of the hosts domain names, use the request Host header in the upstream request headers. By default set to false, and the upstream Host header will be that of the Service\'s host.',
        'service.id' => 'The Service this Route is associated to. This is where the Route proxies traffic to. With form-encoded, the notation is service.id=<service_id>. With JSON, use "service":{"id":"<service_id>"}.',
    ];

    public function handle($params = [])
    {
        if (!isset($params['id'])) {
            throw new BizException(ErrorCode::$ENUM_KONG_ROUTE_INFO_ID_NOT_EXIST);
        }
        $id = $params['id'];

        $params['service'] = ['id' => $params['service.id']];
        unset($params['service.id']);

        $client = KongClient::getInstance();
        $res = $client->updateRoute($id, $params);
        $this->dump($res);
    }
}

