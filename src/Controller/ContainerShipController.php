<?php

namespace App\Controller;

use App\Service\ContainerShipService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContainerShipController extends AbstractController
{
    /**
     * @Route("/containership", name="containership")
     * @param ContainerShipService $containerShipService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function containerShipAction(ContainerShipService $containerShipService): \Symfony\Component\HttpFoundation\Response
    {
        $containerShips = $containerShipService->getContainerShips();
        return $this->render('ContainerShip/containerShips.html.twig', array(
            'containerShips' => $containerShips
        ));
    }

    /**
     * @Route("/containership/{id}", name="containership_info")
     * @param ContainerShipService $containerShipService
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function containerShipIdAction(ContainerShipService $containerShipService, int $id): \Symfony\Component\HttpFoundation\Response
    {
        $containerShip = $containerShipService->getContainerShipById($id);
        return $this->render('ContainerShip/containership_info.html.twig', array(
            'containerShip' => $containerShip
        ));
    }

    /**
     * @Route("/containership/new/", name="containership_new")
     * @param Request $request
     * @param ContainerShipService $containerShipService
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function containerShipNewAction(Request $request, ContainerShipService $containerShipService)
    {
        if ($request->getMethod() === 'POST') {
            $containerShip = $containerShipService->addContainerShip($request);
            return $this->redirectToRoute('containership_info', array('id' => $containerShip->getId()));
        }

        return $this->render('ContainerShip/containership_add.html.twig');
    }

}