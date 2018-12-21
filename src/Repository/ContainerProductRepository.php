<?php

// src/AppBundle/Repository/ProductRepository.php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ContainerProductRepository extends EntityRepository
{
    public function findAllContainerProducts()
    {
        return $this->findAll();
    }
}