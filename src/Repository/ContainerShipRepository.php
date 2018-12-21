<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ContainerShipRepository extends EntityRepository
{
    public function findAllContainerShips()
    {
        return $this->findAll();
    }

    public function findContainerShipById($id) {
        return $this->findOneBy(array('id' => $id));
    }

    public function getNbContainers() {

    }
}