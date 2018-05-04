<?php

namespace App\Tasks\Kong\Services;

use App\Common\Clients\KongClient;
use App\Tasks\Kong\KongTask;
use App\Tasks\Task;

class AddTask extends KongTask
{
    public $params = [
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
    ];

    public function handle($params = [])
    {
        $client = KongClient::getInstance();
        $res = $client->addService($params);
        $this->dump($res);
    }
}
