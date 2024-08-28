<?php

namespace Src\Infra\Di;

use Psr\Container\ContainerInterface;
use Slim\Psr7\Response;

class Container implements ContainerInterface {
  private array $settings = [];

  public function set(string $id, mixed $value) {
    $this->settings[$id] = $value;
  }

  public function get(string $id): mixed {
    return $this->settings[$id];
  }

  public function has(string $id): bool {
    return isset($this->settings[$id]);
  }
}