<?php

namespace App\UseCase;

use Infra\Repository\UserRepositoryInterface;
use Domain\User;

class CreateUser {
  public function __construct(
    private UserRepositoryInterface $userRepository
  ) {}

  public function execute(CreateUserInputDto $inputDto): CreateUserOutputDto {
    $name = $inputDto->name;
    $password = $inputDto->password;
    $user = new User($name, $password);
    $user = $this->userRepository->save($user);
    return new CreateUserOutputDto($user->getId(), $user->getName());
  }
}

class CreateUserInputDto {
  public function __construct(
    public string $name,
    public string $password
  ) {}
}

class CreateUserOutputDto {
  public function __construct(
    public int $id,
    public string $name
  ) {}
}