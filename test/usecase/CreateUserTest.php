<?php

namespace Tests;

use Chiroptera\Layers\App\Usecase\{CreateUserInputDto, CreateUserOutputDto, CreateUser};
use Chiroptera\Layers\Infra\Database\DataBaseMemory;
use Chiroptera\Layers\Infra\Repository\UserRepositoryMemory;
use PHPUnit\Framework\TestCase;

class CreateUserTest extends TestCase {
    public function testMustCreateUser() {
        $dataBase = new DataBaseMemory();
        $userRepository = new UserRepositoryMemory($dataBase);
        $useCase = new CreateUser($userRepository);
        $name = 'John Doe';
        $password = '123';
        $inputDto = new CreateUserInputDto($name, $password);

        $outputDto = $useCase->execute($inputDto);

        $this->assertEquals(1, $outputDto->id);
        $this->assertEquals($name, $outputDto->name);
        $this->assertInstanceOf(CreateUserOutputDto::class, $outputDto);
    }
}