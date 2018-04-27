<?php

namespace App\Tasks\Kong;

use App\Common\Clients\KongClient;
use App\Common\Clients\KongHandler;
use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\BizException;
use App\Common\Validators\Kong\AddServiceValidator;
use App\Tasks\Task;
use Xin\Cli\Color;
use Xin\Phalcon\Cli\Traits\Input;

class ServiceTask extends Task
{
    use Input;

    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  清理缓存信息') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run kong:service@[action]', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  services        查看服务列表', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  add             新增服务', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

    public function addAction()
    {
        $validator = new AddServiceValidator();
        if ($validator->validate($this->arguments())->valid()) {
            throw new BizException(ErrorCode::$ENUM_PARAMS_ERROR, $validator->getErrorMessage());
        }

        $name = $validator->getValue('name');
        $url = $validator->getValue('url');

        $res = KongClient::getInstance()->add($name, $url);
        echo Color::colorize('新增服务成功！', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

    public function servicesAction()
    {
        $client = KongHandler::getInstance();
        $res = $client->services();
        dd($res);
    }
}

