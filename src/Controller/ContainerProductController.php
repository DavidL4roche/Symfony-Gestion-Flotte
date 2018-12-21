<?php
namespace App\Controller;

use App\Service\ContainerProductService;
use App\Service\ContainerService;
use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContainerProductController extends AbstractController
{

    /**
     * @Route("/containerproduct", name="container_product")
     */
    public function containerProductAction(ContainerProductService $containerProductService)
    {
        $container_products = $containerProductService->getAllContainerProducts();
        return $this->render('ContainerProduct/container_products.html.twig', array(
            'containerProducts' => $container_products
        ));
    }

    /**
     * @Route("/product-container/new/", name="product_container_new")
     */
    public function containerProductNewAction(Request $request, ContainerProductService $containerProductService, ProductService $productService, ContainerService $containerService)
    {
        if($request->getMethod() == 'POST') {
            $containerShip = $containerProductService->addContainerProduct($request);
            return $this->redirectToRoute('container_product');
        }

        $products = $productService->getProducts();
        $containers = $containerService->getContainers();
        return $this->render('ContainerProduct/containerProduct_add.html.twig', array(
            'products' => $products,
            'containers' => $containers
        ));
    }

}