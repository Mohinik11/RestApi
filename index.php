<?php

    use Phroute\Phroute\Exception\HttpRouteNotFoundException;
    use Phroute\Phroute\RouteCollector;
    use Phroute\Phroute\RouteParser;
    use Phroute\Phroute\Dispatcher;
    use Zend\Diactoros\Response;

    require __DIR__.'/bootstrap.php';

    $router = new RouteCollector(new RouteParser());
    require __DIR__.'/http/routes.php';
    require __DIR__.'/dependencies.php';

    /**
     * init the dispatcher and the response
     */
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData(), new RouterResolver($container));
    try {
        $body = [
                $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
            ];
        $status = 200;
    }catch (HttpRouteNotFoundException $e){
        $body     = [
            $e->getMessage(),
        ];
        $status = 404;
    }catch(\InvalidArgumentException $e){
        $body     = [
            $e->getMessage()
        ];
        $status = 500;
    }

    $response = new Response\JsonResponse($body, $status);
    echo $response->getBody();
