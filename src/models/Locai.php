<?php

namespace src\models;

use \core\Model;

class Locai extends Model
{
  public function __construct()
  {
    var_dump($this->getTableName());
  }
}
