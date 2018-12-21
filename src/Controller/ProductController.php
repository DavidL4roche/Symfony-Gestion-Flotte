<?php
// src/AppBundle/Controller/HomeController.php
namespace App\Controller;

use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function productAction(ProductService $productService)
    {
        $products = $productService->getproducts();
        return $this->render('Product/products.html.twig', array(
            'products' => $products
        ));
    }

    /**
     * @Route("/product/{id}", name="product_info")
     */
    public function productIdAction(ProductService $productService, $id)
    {
        $product = $productService->getproductById($id);
        return $this->render('Product/product_info.html.twig', array(
            'product' => $product
        ));
    }

}