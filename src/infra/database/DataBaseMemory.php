<?php

namespace Chiroptera\Layers\Infra\Database;

class DataBaseMemory implements DataBaseInterface {
  private $tables = [];

  public function count(string $tableName): int {
    $table = $this->tables[$tableName] ?? [];
    return count($table);
  }

  public function insert(array $data, string $tableName): int {
    $id = $this->count($tableName) + 1;
    $this->tables[$tableName][$id] = $data;
    return $id;
  }
}