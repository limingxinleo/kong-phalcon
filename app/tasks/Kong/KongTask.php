<?php
// +----------------------------------------------------------------------
// | KongTaskInterface.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Tasks\Kong;

use App\Common\Exceptions\BizException;
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

    protected function dump($result, $index = 0)
    {
        if ($index > 0) {
            echo PHP_EOL;
        }
        if (is_array($result)) {
            foreach ($result as $key => $val) {
                for ($i = 0; $i < $index; $i++) {
                    echo " ";
                }
                echo Color::colorize("{$key}: ", Color::FG_LIGHT_GREEN);
                if (is_array($val)) {
                    $this->dump($val, $index + 1);
                } else {
                    echo Color::colorize("{$val}", Color::FG_LIGHT_GREEN) . PHP_EOL;
                }
            }
        }
    }

    protected function getIdOrName()
    {
        $params = $this->getParams();
        if (isset($params['id'])) {
            return $params['id'];
        }

        if (isset($params['name'])) {
            return $params['name'];
        }

        throw new BizException(ErrorCode::$ENUM_KONG_SERVICE_ID_OR_NAME_NOT_EXIST);
    }
}
