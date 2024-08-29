<?php

namespace Chiroptera\Layers\Infra\Repository;

use Chiroptera\Layers\Domain\User;

interface UserRepositoryInterface {
  public function save(User $user): User;
}