<?php

// src/AppBundle/Repository/ProductRepository.php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ContainerRepository extends EntityRepository
{
    public function findAllContainers()
    {
        return $this->findAll();
    }
}