<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="main")
     * @Route("/admin/{vueRouting}", name="admin")
     * @Route("/admin/{vueRouting}/{vueRouting1}")
     * @Route("/{vueRouting}", name="index")
     */
    public function index()
    {
        return $this->render("base.html.twig", []);
    }
}
