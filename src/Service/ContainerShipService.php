<?php

namespace App\Service;

use App\Entity\ContainerShip;
use Doctrine\ORM\EntityManagerInterface;

class ContainerShipService
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getContainerShips()
    {
        return $this->entityManager->getRepository(ContainerShip::class)->findAllContainerShips();
    }

    public function getContainerShipById($id)
    {
        return $this->entityManager->getRepository(ContainerShip::class)->findContainerShipById($id);
    }

    public function addContainerShip($request): ContainerShip
    {
        $containerShip = new ContainerShip();
        $containerShip->setName($request->request->get('name'));
        $containerShip->setCaptainName($request->request->get('captain_name'));
        $containerShip->setContainerLimit($request->request->get('container_limit'));

        $this->entityManager->persist($containerShip);
        $this->entityManager->flush();
        return $containerShip;
    }
}