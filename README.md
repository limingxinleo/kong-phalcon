# PHALCON基础开发框架

> 本项目以[limingxinleo/phalcon-project](https://github.com/limingxinleo/phalcon)为基础，进行简易封装。

[![Build Status](https://travis-ci.org/limingxinleo/service-admin-api.svg?branch=master)](https://travis-ci.org/limingxinleo/service-admin-api)
[![Total Downloads](https://poser.pugx.org/limingxinleo/phalcon-project/downloads)](https://packagist.org/packages/limingxinleo/phalcon-project)
[![Latest Stable Version](https://poser.pugx.org/limingxinleo/phalcon-project/v/stable)](https://packagist.org/packages/limingxinleo/phalcon-project)
[![Latest Unstable Version](https://poser.pugx.org/limingxinleo/phalcon-project/v/unstable)](https://packagist.org/packages/limingxinleo/phalcon-project)
[![License](https://poser.pugx.org/limingxinleo/phalcon-project/license)](https://packagist.org/packages/limingxinleo/phalcon-project)


[Phalcon 官网](https://docs.phalconphp.com/zh/latest/index.html)

[Kong 官网](https://konghq.com/install/)

[wiki](https://github.com/limingxinleo/simple-subcontrollers.phalcon/wiki)

[相关前端项目](https://github.com/limingxinleo/kong-vue)

### 封装版本
- [Thrift GO服务版本](https://github.com/limingxinleo/thrift-go-phalcon-project)
- [Phalcon快速开发框架](https://github.com/limingxinleo/biz-phalcon)
- [Phalcon基础开发框架](https://github.com/limingxinleo/basic-phalcon)
- [Zipkin开发版本](https://github.com/limingxinleo/zipkin-phalcon)
- [Eureka开发版本](https://github.com/limingxinleo/eureka-phalcon)
- [RabbitMQ](https://github.com/limingxinleo/rabbitmq-phalcon)
- [ELK开发版本](https://github.com/limingxinleo/elk-phalcon)

### 测试以及其他DEMO
- [框架测试](https://github.com/limingxinleo/phalcon-unit-test)
- [多库单表](https://github.com/limingxinleo/service-demo-order)
- [Elasticsearch](https://github.com/Aquarmini/elasticsearch-demo-phalcon)
- [kafka](https://github.com/Aquarmini/kafka-demo-phalcon)
- [机器学习](https://github.com/Aquarmini/ml-demo-phalcon)
- [正则匹配](https://github.com/Aquarmini/regex-demo-phalcon)

## 项目介绍
本仓库基于[Phalcon Admin API](https://github.com/limingxinleo/service-admin-api)开发。
对应前端模块[前端H5](https://github.com/limingxinleo/kong-vue)。

## 使用
首先我们先添加服务和对应路由
然后我们访问网关http://kong/demo 就可以代理到http://api.demo.phalcon.xin上。
~~~
php run kong:services:add name=demo url=http://api.demo.phalcon.xin
php run kong:routes:add service.id=f3c89bff-ae39-42e9-8428-91ffd958f12b methods=POST methods=GET paths=/demo
curl http://kong/demo/api ---> curl http://api.demo.phalcon.xin/api
~~~

插件的使用
1. 调用频率限制 rate-limiting
设置对应的service_id 和 频率即可
~~~
php run kong:plugins:add name=rate-limiting service_id=f3c89bff-ae39-42e9-8428-91ffd958f12b config.minute=2
~~~

2. 文件日志 file-log
~~~
php run kong:plugins:add name=file-log service_id=f3c89bff-ae39-42e9-8428-91ffd958f12b config.path=/www/log/kong
~~~

3. 基础权限验证 basic-auth
~~~
php run kong:plugins:add name=basic-auth service_id=f3c89bff-ae39-42e9-8428-91ffd958f12b
# 设置对应消费者
php run kong:consumers:add username=limx
# 为对应消费者增加密码 id和name必传其一
php run kong:consumers:updateBasicAuth id=5692bf90-7e0d-415f-ab7a-5e75aba8833d username=limx password=910123
php run kong:consumers:updateBasicAuth id=5692bf90-7e0d-415f-ab7a-5e75aba8833d username=Agnes password=910123
php run kong:consumers:addBasicAuth name=limx username=limx2 password=910123
# username=limx password=910123 ===> authroization:base64_encode('limx:910123') ====> bGlteDo5MTAxMjM=
# curl -X POST http://api.xxx.cn/demo -H 'Authorization: Basic bGlteDo5MTAxMjM=' 即可
~~~

4. IP限制 ip-restriction
~~~
php run kong:plugins:add name=ip-restriction service_id=f3c89bff-ae39-42e9-8428-91ffd958f12b config.whitelist=127.0.0.1
~~~




