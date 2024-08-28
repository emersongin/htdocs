<?php

namespace Infra\Repository;

use Domain\User;

interface UserRepositoryInterface {
  public function save(User $user): User;
}