<?php

require_once __DIR__ . '/../bootstrap.php';


use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;
use Infra\Di\Container;
use Infra\Http\UserHttpController;
use Infra\Http\SlimHttpServer;
use Infra\Database\DataBaseMemory;
use Infra\Repository\UserRepositoryMemory;
use App\CreateUser;

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
