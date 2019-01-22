<?php

namespace App\Service;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class ProductService
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getProducts()
    {
        return $this->entityManager->getRepository(Product::class)->findAllProducts();
    }

    public function getProductById($id)
    {
        return $this->entityManager->getRepository(Product::class)->findProductById($id);
    }

    public function addProduct($request): Product
    {
        $product = new Product();

        $product->setName($request->request->get('name'));
        $product->setLength($request->request->get('length'));
        $product->setWidth($request->request->get('width'));
        $product->setHeight($request->request->get('height'));

        $this->entityManager->persist($product);
        $this->entityManager->flush();
        return $product;
    }
}