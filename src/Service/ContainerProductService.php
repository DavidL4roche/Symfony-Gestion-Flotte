<?php

namespace App\Service;

use App\Entity\Container;
use App\Entity\ContainerModel;
use App\Entity\ContainerProduct;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class ContainerProductService{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllContainerProducts() {
        return $this->entityManager->getRepository(ContainerProduct::class)->findAllContainerProducts();
    }

    public function addContainerProduct($request)
    {
        $container = $this->entityManager->getRepository(Container::class)->findContainerById($request->request->get('container'));
        $product = $this->entityManager->getRepository(Product::class)->findProductById($request->request->get('product'));

        $containerProduct = new ContainerProduct();

        $containerProduct->setContainer($container);
        $containerProduct->setProduct($product);
        $containerProduct->setQuantity($request->request->get('quantity'));

        $this->entityManager->persist($containerProduct);
        $this->entityManager->flush();
    }

}