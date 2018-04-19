<?php

use \Symfony\Component\HttpFoundation\Request;

include 'InterfaceController.php';

/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 19/04/18
 * Time: 13:30
 */
class BaseController
{
    /**
     * @var Request
     */
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

}