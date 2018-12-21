<?php

namespace App\Service;

use App\Entity\Container;
use App\Entity\ContainerModel;
use App\Entity\ContainerShip;
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

    public function getContainerById($id) {
        return $this->entityManager->getRepository(Container::class)->findContainerById($id);
    }

    public function addContainer($request) {

        $containerModel = $this->entityManager->getRepository(ContainerModel::class)->findContainerModelById($request->request->get('container_model'));
        $containerShip = $this->entityManager->getRepository(ContainerShip::class)->findContainerShipById($request->request->get('container_ship'));

        $container = new Container();
        $container->setColor($request->request->get('color'));
        $container->setContainerModel($containerModel);
        $container->setContainership($containerShip);

        $this->entityManager->persist($container);
        $this->entityManager->flush();
        return $container;
    }

}