<?php

require_once __DIR__ . '/../bootstrap.php';


use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;
use Src\Infra\Di\Container;
use Src\Infra\Http\UserHttpController;
use Src\Infra\Http\SlimHttpServer;

try {
  // $container = new Container();
  // $container->set('response', 'Hello, World!');
  $httpServer = new SlimHttpServer();
  $controller = new UserHttpController($httpServer);
  $httpServer->run();
} catch (Throwable $e) {
  echo $e->getMessage();
}
