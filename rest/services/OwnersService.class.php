<?php
require_once __DIR__. '/BaseService.class.php';
require_once __DIR__ . '/../dao/OwnersDao.class.php';

class OwnersService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new OwnersDao);
    }

    function getOwnerByFullName($full_name)
    {
        return $this->dao->getOwnerByFullName($full_name);
    }
}

?>