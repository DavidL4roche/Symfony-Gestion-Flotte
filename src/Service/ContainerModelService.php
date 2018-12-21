<?php

namespace App\Service;

use App\Entity\Container;
use App\Entity\ContainerModel;
use Doctrine\ORM\EntityManagerInterface;

class ContainerModelService{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getContainerModels()
    {
        return $this->entityManager->getRepository(ContainerModel::class)->findAllContainerModels();
    }

}