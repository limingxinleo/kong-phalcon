<?php
// +----------------------------------------------------------------------
// | AddServiceValidator.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\Validators\Kong;

use App\Core\Validation\Validator;

class AddServiceValidator extends Validator
{
    public function initialize()
    {
        $this->add(
            [
                'name',
                'url'
            ],
            new \Phalcon\Validation\Validator\PresenceOf([
                'message' => 'The :field is required',
            ])
        );
    }
}