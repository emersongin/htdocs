<?php

namespace Infra\Http;

use Infra\View\UsersView;

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
  }
}