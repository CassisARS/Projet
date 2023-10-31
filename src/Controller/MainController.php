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
           return $this->render("main/home.html.twig");
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(){
        return new Response( "Page contact");
    }


    /**
     * @Route("/test",name="test")
     */

    public function test(){

        $colors = ["rouge","bleu","rouge","violet"];

        $today = new \DateTime();

        return $this->render("main/test.html.twig",["colors"=>$colors,

            'today'=>$today]);

    }
}