<?php
namespace Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function responseJson($data)
    {
        $response = new \Phalcon\Http\Response();
        $response->setHeader("Content-Type", "application/json");

        if(! is_string($data))
        {
            $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        $response->setContent($data);

        $response->send();
    }
}
