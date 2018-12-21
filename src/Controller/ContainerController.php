<?php
// src/AppBundle/Controller/HomeController.php
namespace App\Controller;

use App\Service\ContainerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContainerController extends AbstractController
{
    /**
     * @Route("/containers", name="containers")
     */
    public function containersAction(ContainerService $containerService)
    {
        $containers = $containerService->getContainers();
        return $this->render('Container/containers.html.twig', array(
            'containers' => $containers
        ));
    }

}