<?php
require_once __DIR__. '/BaseService.class.php';
require_once __DIR__ . '/../dao/AnimalsDao.class.php';

class AnimalsService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new AnimalsDao);
    }

    function getAnimalsById($animals_id)
    {
        return $this->dao->getAnimalsById($animals_id);
    }
}

?>