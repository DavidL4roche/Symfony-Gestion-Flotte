<?php

namespace App\Controller;

use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     * @param ProductService $productService
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function productAction(ProductService $productService): \Symfony\Component\HttpFoundation\Response
    {
        $products = $productService->getProducts();
        return $this->render('Product/products.html.twig', array(
            'products' => $products
        ));
    }

    /**
     * @Route("/product/{id}", name="product_info")
     * @param ProductService $productService
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function productIdAction(ProductService $productService, int $id): \Symfony\Component\HttpFoundation\Response
    {
        $product = $productService->getProductById($id);
        return $this->render('Product/product_info.html.twig', array(
            'product' => $product
        ));
    }

    /**
     * @Route("/product/new/", name="product_new")
     * @param Request $request
     * @param ProductService $productService
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function productNewAction(Request $request, ProductService $productService)
    {
        if ($request->getMethod() === 'POST') {
            $product = $productService->addProduct($request);
            return $this->redirectToRoute('product_info', array('id' => $product->getId()));
        }

        return $this->render('Product/product_add.html.twig');
    }

}