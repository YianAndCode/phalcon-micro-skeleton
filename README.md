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