<?php
require_once __DIR__. './BaseDao.class.php';

class AnimalsDao extends BaseDao { 
    
  public function __construct(){
    parent::__construct("animals");
  }

  function getAnimalsByName($name)
  {
    return $this->query_unique("SELECT * FROM animals WHERE name = :name", ["name" =>$name]);
    
  }

}

?>