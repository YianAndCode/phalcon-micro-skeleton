# Phalcon Micro Skeleton

> Phalcon 微服务项目模板

## 目录结构

```
├── app
│   ├── config
│   │   ├── config.php
│   │   ├── loader.php
│   │   ├── router.php
│   │   └── services.php
│   │
│   ├── controllers
│   │   └── ControllerBase.php
│   │
│   ├── middlewares
│   │   └── MiddlewareBase.php
│   │
│   ├── models
│   │   └── ModelBase.php
│   │
│   ├── services
│   │
│   ├── tasks
│   │   └── MainTask.php
│   │
│   ├── traits
│   │   └── Model
│   │       └── SoftDelete.php
│   │
│   ├── app.php
│   └── cli.php
│
├── public
│   ├── index.php
│   └── .htaccess
│
├── vendor
│
├── composer.json
├── config.ini
└── index.html
```

其中，`/vendor` 是由 composer 安装的依赖包目录，默认为使用 composer 依赖，如果不需要，则将 `/public/index.php` 中的

```
require BASE_PATH . '/vendor/autoload.php';
```

注释或删除即可

## 中间件

Phalcon 的中间件不支持只对某一组路由生效，因此对中间件封装了一次，可以直接继承 `Middlewares\MiddlewareBase`，然后重写 `public function handle(Micro $app): bool` 方法即可；`Middlewares\MiddlewareBase` 添加了 `protected $onlys = [];`（白名单） 和 `protected $excepts = [];`（排除列表），支持正则表达式，例如：

```PHP
<?php

namespace Middlewares;

use Phalcon\Mvc\Micro;

class AuthMiddleware extends MiddlewareBase
{
    protected $excepts = [
        '/user/login',    // 用户登录
        '/wechat/*',      // 微信被动消息、支付回调等等
    ];

    public function handle(Micro $app): bool
    {
        if (! is_authorized()) {
            return false;
        }

        return true;
    }
}

```