<?php
require_once __DIR__. './BaseDao.class.php';

class OwnersDao extends BaseDao { 
    
  public function __construct(){
    parent::__construct("owners");
  }

  function getOwnerByFullName($full_name)
  {
    return $this->query_unique("SELECT * FROM owners WHERE full_name = :full_name", ["full_name" =>$full_name]);
    
  }

}

?>