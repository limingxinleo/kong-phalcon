<?php

namespace App\Tasks\Kong\Plugins;

use App\Tasks\Kong\KongTask;

class AddTask extends KongTask
{
    public $params = [
        'name' => 'The name of the Plugin that\'s going to be added. Currently the Plugin must be installed in every Kong instance separately.',
        'consumer_id' => 'The unique identifier of the consumer that overrides the existing settings for this specific consumer on incoming requests.',
        'config.{property}' => 'The configuration properties for the Plugin which can be found on the plugins documentation page in the Plugin Gallery.',
    ];

    public $mappers = [
        'rate-limiting' => [

        ],
    ];

    protected function getParams()
    {
        $params = [];
        foreach ($this->params as $key => $desc) {
            if ($data = $this->argument($key)) {
                $params[$key] = $data;
            }
        }
        return $params;
    }

    public function handle($params = [])
    {
        $client = KongClient::getInstance();
        $res = $client->addConsumer($params);
        $this->dump($res);
    }

    public function pluginMapper($name)
    {

    }
}

