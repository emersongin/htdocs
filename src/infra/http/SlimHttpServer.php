<?php

namespace Infra\Http;

use Slim\Factory\AppFactory;

class SlimHttpServer implements HttpServerInterface {
  private $app;

  public function __construct() {
    $this->app = AppFactory::create();
  }

  public function get(string $route, callable $callback): void {
    $this->app->get($route, $callback);
  }

  public function post(string $route, callable $callback): void {
    $this->app->post($route, $callback);
  }

  public function run(): void {
    $this->app->run();
  }
}