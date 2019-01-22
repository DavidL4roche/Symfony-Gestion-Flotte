<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ContainerProductRepository extends EntityRepository
{
    public function findAllContainerProducts(): array
    {
        return $this->findAll();
    }
}