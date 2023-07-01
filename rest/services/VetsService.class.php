<?php
require_once __DIR__. '/BaseService.class.php';
require_once __DIR__ . '/../dao/VetsDao.class.php';

class VetsService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new VetsDao);
    }

    function getVetsByFullName($full_name)
    {
        return $this->dao->getVetsByFullName($full_name);
    }
}

?>