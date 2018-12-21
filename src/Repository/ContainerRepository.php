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

    public function findContainerById($id) {
        return $this->findOneBy(array('id' => $id));
    }
}