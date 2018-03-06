<?php
// +----------------------------------------------------------------------
// | 基础测试类 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Units;

use Phalcon\Text;
use Tests\HttpTestCase;

/**
 * Class UnitTest
 */
class UserTest extends HttpTestCase
{
    public function testUserLoginCase()
    {
        $this->assertTrue($this->login());
    }

    public function testUserInfoCase()
    {
        $res = $this->post('/api/user/info');

        $this->assertEquals(0, $res['code']);
        $this->assertEquals('超级管理员', $res['data']['nickname']);
    }

    public function testUserListCase()
    {
        $res = $this->post('/api/user/list', [
            'pageIndex' => 0,
            'pageSize' => 10,
        ]);

        $this->assertEquals(0, $res['code']);
    }

    public function testUserSaveCase()
    {
        $res = $this->post('/api/user/save', [
            'nickname' => '测试管理员',
            'username' => Text::random(Text::RANDOM_ALNUM, 6),
            'email' => Text::random(Text::RANDOM_ALNUM, 6) . '@qq.com',
            'mobile' => Text::random(Text::RANDOM_NUMERIC, 11)
        ]);

        $this->assertEquals(0, $res['code']);
    }

    public function testUserRolesCase()
    {
        $res = $this->post('/api/user/roles', [
            'userId' => 1,
            'pageIndex' => 0,
            'pageSize' => 10
        ]);

        $this->assertEquals(0, $res['code']);
    }

    public function testUserRoleUpdateCase()
    {
        $res = $this->post('/api/user/roles/update', [
            'userId' => 2,
            'roleId' => 2
        ]);

        $this->assertEquals(0, $res['code']);
    }
}
