<?php

namespace Src\Infra\Http;

interface HttpServer {
  public function get(string $route, callable $callback): void;
  public function post(string $route, callable $callback): void;
  public function run(): void;
}