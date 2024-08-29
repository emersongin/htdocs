<?php

namespace Chiroptera\Layers\Infra\Http;

interface HttpServerInterface {
  public function get(string $route, callable $callback): void;
  public function post(string $route, callable $callback): void;
  public function run(): void;
}