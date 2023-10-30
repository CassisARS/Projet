<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function home(){
           return new Response( "Hello World!");
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(){
        return new Response( "Page contact");
    }
}