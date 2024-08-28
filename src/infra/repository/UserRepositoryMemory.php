<?php

namespace Infra\Repository;

use Domain\User;
use Infra\Database\DataBaseInterface;

class UserRepositoryMemory implements UserRepositoryInterface {
  public function __construct(
    private readonly DataBaseInterface $dataBase
  ) {}

  public function save(User $user): User {
    $name = $user->getName();
    $password = $user->getPassword();
    $id = $this->dataBase->insert(['name' => $name, 'password' => $password], 'users');
    return User::restore($id, $name, $password);
  }
}