<?php

namespace App\Service;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class ProductService{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getProducts()
    {
        return $this->entityManager->getRepository(Product::class)->findAllProducts();
    }

    public function getProductById($id) {
        return $this->entityManager->getRepository(Product::class)->findProductById($id);
    }
}