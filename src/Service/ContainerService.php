<?php

namespace App\Service;

use App\Entity\Container;
use Doctrine\ORM\EntityManagerInterface;

class ContainerService{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getContainers()
    {
        return $this->entityManager->getRepository(Container::class)->findAllContainers();
    }
}