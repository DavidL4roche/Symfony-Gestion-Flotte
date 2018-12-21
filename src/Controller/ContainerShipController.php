<?php
// src/AppBundle/Controller/HomeController.php
namespace App\Controller;

use App\Service\ContainerService;
use App\Service\ContainerShipService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContainerShipController extends AbstractController
{
    /**
     * @Route("/containership", name="containership")
     */
    public function containerShipAction(ContainerShipService $containerShipService)
    {
        $containerShips = $containerShipService->getContainerShips();
        return $this->render('ContainerShip/containerShips.html.twig', array(
            'containerShips' => $containerShips
        ));
    }

    /**
     * @Route("/containership/{id}", name="containership_info")
     */
    public function containerShipIdAction(ContainerShipService $containerShipService, $id)
    {
        $containerShip = $containerShipService->getContainerShipById($id);
        return $this->render('ContainerShip/containership_info.html.twig', array(
            'containerShip' => $containerShip
        ));
    }

}