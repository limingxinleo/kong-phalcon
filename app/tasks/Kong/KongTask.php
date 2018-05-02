<?php
// +----------------------------------------------------------------------
// | KongTaskInterface.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Tasks\Kong;

use App\Tasks\Task;
use Xin\Cli\Color;
use Xin\Phalcon\Cli\Traits\Input;

abstract class KongTask extends Task
{
    use Input;

    public $params = [];

    public function mainAction()
    {
        if ($this->option('help')) {
            echo Color::head('参数信息:') . PHP_EOL;
            foreach ($this->params as $key => $desc) {
                echo Color::colorize("  {$key}: ", Color::FG_LIGHT_RED);
                echo Color::colorize("{$desc}", Color::FG_LIGHT_GREEN) . PHP_EOL;
            }
            return;
        }

        $this->handle($this->getParams());
    }

    abstract public function handle($params = []);

    public function getParams()
    {
        $params = [];
        foreach ($this->params as $key => $desc) {
            if ($data = $this->argument($key)) {
                $params[$key] = $data;
            }
        }
        return $params;
    }
}
