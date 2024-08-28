<?php

namespace Infra\Di;

use Psr\Container\ContainerInterface;
use Slim\Psr7\Response;

class Container implements ContainerInterface {
  private Container | null $instance = null;
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

  public static function getInstance(): Container {
    static $instance = null;
    if ($instance === null) {
      $instance = new Container();
    }
    return $instance;
  }
}