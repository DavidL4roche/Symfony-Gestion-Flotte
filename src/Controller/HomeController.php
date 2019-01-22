<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('Home/homepage.html.twig');
    }

}