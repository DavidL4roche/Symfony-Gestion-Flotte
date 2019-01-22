<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ContainerModelRepository extends EntityRepository
{
    public function findAllContainerModels(): array
    {
        return $this->findAll();
    }

    public function findContainerModelById($id)
    {
        return $this->findOneBy(array('id' => $id));
    }
}