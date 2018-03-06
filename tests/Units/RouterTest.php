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
class RouterTest extends HttpTestCase
{
    public function testRouterUpdateCase()
    {
        $res = $this->post('/api/router/update');

        $this->assertEquals(0, $res['code']);
    }

    public function testRouterListCase()
    {
        $res = $this->post('/api/router/list', [
            'pageIndex' => 0,
            'pageSize' => 10
        ]);

        $this->assertEquals(0, $res['code']);
        $this->assertArrayHasKey('total', $res['data']);
        $this->assertArrayHasKey('items', $res['data']);
    }

    public function testRouterSaveCase()
    {
        $res = $this->post('/api/router/save', [
            'name' => '测试路由',
            'route' => '/api/xxx/xxx'
        ]);

        $this->assertEquals(0, $res['code']);
    }
}
