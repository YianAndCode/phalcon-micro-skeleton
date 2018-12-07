<?php

namespace Middlewares;

use Phalcon\Events\Event;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;

class MiddlewareBase implements MiddlewareInterface
{
    /**
     * 白名单
     *
     * @var array
     */
    protected $onlys = [];

    /**
     * 排除列表
     *
     * @var array
     */
    protected $excepts = [];

    public function beforeHandleRoute(Event $event, Micro $app)
    {
        $uri = $app->request->getURI();

        // 如果白名单不为空
        if (count($this->onlys) > 0) {
            foreach ($this->onlys as $only) {
                $pattern = '/' . str_replace('/', '\/', $only) . '/';
                if (preg_match($pattern, $uri)) {
                    // 当前请求在白名单中，执行 handle 逻辑
                    return $this->handle($app);
                }
            }
            // 当前请求不在白名单，直接返回 true，跳过 handle 逻辑
            return true;
        }

        // 如果排除列表不为空
        if (count($this->excepts) > 0) {
            foreach ($this->excepts as $except) {
                $pattern = '/' . str_replace('/', '\/', $except) . '/';
                if (preg_match($pattern, $uri)) {
                    // 当前请求在排除列表中，直接返回 true，跳过 handle 逻辑
                    return true;
                }
            }
            // 当前请求不在排除列表，需要执行 handle 逻辑
            return $this->handle($app);
        }

        return $this->handle($app);
    }

    public function call(Micro $app)
    {
        return true;
    }

    public function handle(Micro $app): bool
    {
        throw new \Exception('Middleware not implements');
    }
}
