<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function findAllProducts(): array
    {
        return $this->findAll();
    }

    public function findProductById($id)
    {
        return $this->findOneBy(array('id' => $id));
    }
}