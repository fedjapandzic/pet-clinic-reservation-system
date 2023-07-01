<?php
require_once __DIR__. '/BaseService.class.php';
require_once __DIR__ . '/../dao/VisitsDao.class.php';

class VisitsService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new VisitsDao);
    }

    function getVisitsByVisitDate($visit_date)
    {
        return $this->dao->getVisitsByVisitDate($visit_date);
    }
}

?>