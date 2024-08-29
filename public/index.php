<?php

require_once __DIR__ . '/../bootstrap.php';


use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;
use Chiroptera\Layers\Infra\Di\Container;
use Chiroptera\Layers\Infra\Http\UserHttpController;
use Chiroptera\Layers\Infra\Http\SlimHttpServer;
use Chiroptera\Layers\Infra\Database\DataBaseMemory;
use Chiroptera\Layers\Infra\Repository\UserRepositoryMemory;
use Chiroptera\Layers\App\CreateUser;

try {
  $container = Container::getInstance();
  $dataBase = new DataBaseMemory();
  $userRepository = new UserRepositoryMemory($dataBase);
  $createUserUseCase = new CreateUser($userRepository);
  $container->set('CREATE_USER', $createUserUseCase);
  $httpServer = new SlimHttpServer();
  $controller = new UserHttpController($httpServer);
  $httpServer->run();
} catch (Throwable $e) {
  echo $e->getMessage();
}
