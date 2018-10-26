<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $ram = 0;
        return $this->render('default/index.html.twig', []);
    }

    /**
     * @Route("/test", name="test")
     */
    public function testAction(Request $request)
    {
        return $this->render('default/test.html.twig', []);
    }


}
