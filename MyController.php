<?php

class MyController extends BaseController
{
    public function fooAction($vars = array())
    {
        $bar = $vars['bar'];
        $body = 'MyController renders '.$bar;
        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->setContent($body);
        $response->send();
    }
}