<?php

namespace Tests;

use App\CreateUserInputDto;
use App\CreateUserOutputDto;
use App\CreateUserUseCase;
use Infra\Database\DataBaseMemory;
use Infra\Repository\UserRepositoryMemory;
use PHPUnit\Framework\TestCase;

class CreateUserUseCaseTest extends TestCase {
    public function testMustCreateUser() {
        $dataBase = new DataBaseMemory();
        $userRepository = new UserRepositoryMemory($dataBase);
        $useCase = new CreateUserUseCase($userRepository);
        $name = 'John Doe';
        $password = '123';
        $inputDto = new CreateUserInputDto($name, $password);

        $outputDto = $useCase->execute($inputDto);

        $this->assertEquals(1, $outputDto->id);
        $this->assertEquals($name, $outputDto->name);
        $this->assertInstanceOf(CreateUserOutputDto::class, $outputDto);
    }
}