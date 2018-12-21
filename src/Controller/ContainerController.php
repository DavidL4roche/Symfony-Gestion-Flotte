<?php
// src/AppBundle/Controller/HomeController.php
namespace App\Controller;

use App\Service\ContainerModelService;
use App\Service\ContainerService;
use App\Service\ContainerShipService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContainerController extends AbstractController
{
    /**
     * @Route("/container", name="container")
     */
    public function containerAction(ContainerService $containerService)
    {
        $containers = $containerService->getContainers();
        return $this->render('Container/containers.html.twig', array(
            'containers' => $containers
        ));
    }

    /**
     * @Route("/container/{id}", name="container_info")
     */
    public function containerIdAction(ContainerService $containerService, $id)
    {
        $container = $containerService->getContainerById($id);
        return $this->render('Container/container_info.html.twig', array(
            'container' => $container
        ));
    }

    /**
     * @Route("/container/new/", name="container_new")
     */
    public function containerNewAction(Request $request, ContainerService $containerService, ContainerShipService $containerShipService, ContainerModelService $containerModelService)
    {
        if($request->getMethod() == 'POST') {
            $container = $containerService->addContainer($request);
            return $this->redirectToRoute('container_info', array('id' => $container->getId()));
        }

        $containerShips = $containerShipService->getContainerShips();
        $containerModels = $containerModelService->getContainerModels();
        return $this->render('Container/container_add.html.twig', array(
            'containerShips' => $containerShips,
            'containerModels' => $containerModels
        ));
    }

}