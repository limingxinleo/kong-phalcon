<?php
// +----------------------------------------------------------------------
// | 基础测试类 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Units;

use App\Common\Enums\SystemCode;
use Phalcon\Text;
use Tests\HttpTestCase;

/**
 * Class UnitTest
 */
class RoleTest extends HttpTestCase
{
    public function testRoleListCase()
    {
        $res = $this->post('/api/role/list', [
            'pageIndex' => 0,
            'pageSize' => 10
        ]);

        $this->assertEquals(0, $res['code']);
    }

    public function testRoleSaveCase()
    {
        $res = $this->post('/api/role/save', [
            'roleName' => '测试橘色',
            'roleDesc' => '测试橘色'
        ]);

        $this->assertEquals(0, $res['code']);
    }

    public function testRoleRoutersCase()
    {
        $res = $this->post('/api/role/routers', [
            'id' => 1,
            'pageIndex' => 0,
            'pageSize' => 10,
            'searchType' => SystemCode::ADMIN_ROUTER_SEARCH_TYPE_ALL
        ]);

        $this->assertEquals(0, $res['code']);
        $this->assertArrayHasKey('total', $res['data']);
        $this->assertArrayHasKey('list', $res['data']);
    }

    public function testRoleRoutersUpdateCase()
    {
        $res = $this->post('/api/role/routers/update', [
            'roleId' => 2,
            'routerId' => 4,
        ]);

        $this->assertEquals(0, $res['code']);
    }

    public function testRoleRoutersReloadCase()
    {
        $res = $this->post('/api/role/routers/reload');

        $this->assertEquals(0, $res['code']);
    }
}
