<?php

namespace Infra\Database;

interface DataBaseInterface {
  public function count(string $table): int;
  public function insert(array $data, string $table): int;
}