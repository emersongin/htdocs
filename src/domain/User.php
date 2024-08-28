<?php

namespace Domain;

class User {
  private int | null $id = null;

  public function __construct(
    readonly string $name,
    readonly string $password,
  ) {}

  public function getName(): string {
    return $this->name;
  }

  public function getPassword(): string {
    return $this->password;
  }

  public function getId(): int {
    return $this->id;
  }

  public static function restore(int $id, string $name, string $password): User {
    $user = new User($name, $password);
    $user->id = $id;
    return $user;
  }
}