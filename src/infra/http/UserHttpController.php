<?php

namespace Infra\Http;

use Infra\View\UsersView;
use Infra\Di\Container;
use App\CreateUserInputDto;

class UserHttpController {
  public function __construct(
    readonly private HttpServerInterface $httpServer
  ) {
    $this->httpServer->get('/', function ($request, $response, $args) {
      $response->getBody()->write('Hello, World!');
      return $response;
    });

    $this->httpServer->get('/users', function ($request, $response, $args) {
      $html = UsersView::html();
      $response->getBody()->write($html);
      return $response;
    });

    $this->httpServer->post('/users', function ($request, $response, $args) {
      $container = Container::getInstance();
      $createUserUseCase = $container->get('CREATE_USER');
      $body = $request->getParsedBody();
      $inputDto = new CreateUserInputDto($body['name'], $body['password']);
      $output = $createUserUseCase->execute($inputDto);
      $response = $response->withHeader('Content-Type', 'application/json');
      $response = $response->withStatus(200);
      $response->getBody()->write(json_encode($output));
      return $response;
    });
  }
}