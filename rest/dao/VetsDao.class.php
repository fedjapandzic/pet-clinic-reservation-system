<?php
require_once __DIR__. './BaseDao.class.php';

class VetsDao extends BaseDao { 
    
  public function __construct(){
    parent::__construct("vets");
  }

  function getVetsByFullName($full_name)
  {
    return $this->query_unique("SELECT * FROM vets WHERE full_name = :full_name", ["full_name" =>$full_name]);
    
  }

}

?>