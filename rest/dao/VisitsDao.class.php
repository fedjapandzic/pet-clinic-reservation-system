<?php
require_once __DIR__. './BaseDao.class.php';

class VisitsDao extends BaseDao { 
    
  public function __construct(){
    parent::__construct("visits");
  }

  function getVisitsByVisitDate($visit_date)
  {
    return $this->query_unique("SELECT * FROM visits WHERE visit_date = :visit_date", ["visit_date" =>$visit_date]);
    
  }

}

?>