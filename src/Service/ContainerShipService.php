<?php

namespace App\Service;

use App\Entity\ContainerShip;
use Doctrine\ORM\EntityManagerInterface;

class ContainerShipService{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getContainerShips()
    {
        return $this->entityManager->getRepository(ContainerShip::class)->findAllContainerShips();
    }

    public function getContainerShipById($id) {
        return $this->entityManager->getRepository(ContainerShip::class)->findContainerShipById($id);
    }
}