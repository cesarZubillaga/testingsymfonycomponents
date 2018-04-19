<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'vendor/autoload.php';

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Router;
use Symfony\Component\Config\FileLocator;

// this should be done with composer
include 'BaseController.php';
include 'MyController.php';

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$fileLocator = new FileLocator(array(__DIR__));
$requestContext = new RequestContext();
$requestContext->fromRequest($request);
$router = new Router(
    new YamlFileLoader($fileLocator),
    'routes.yaml',
    array('cache_dir' => __DIR__ . '/cache'),
    $requestContext
);
try {
    //include the Controller if needed
    $matcher = $router->match($request->getPathInfo());
    $controller_method = (explode('::', $matcher['_controller']));
    $controller = new $controller_method[0]($request);
    $controller->{$controller_method[1]}($matcher);
} catch (\Exception $e) {
    echo 'route does not exist';
}
