<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/serie")
 */
class SerieController extends AbstractController
{
    /**
     * @Route("/", name="serie_index")
     */
    // index= liste
    public function index(SerieRepository $serieRepository): Response
    {
        //récupérer la liste des séries en base de données

       // $series= $serieRepository->findAll(); // Select * From serie
        $series= $serieRepository->findBy([], ['popularity' => 'DESC', 'vote' =>'DESC'], 30); // Select * From serie ORDER
        return $this->render('serie/index.html.twig', ['series' =>$series]);
    }



    /**
     * @Route("/{id}", name="serie_show", requirements={"id"="\d+"})
     */
    //show= détails
    public function show(int $id, SerieRepository $serieRepository): Response
    {
        // récupérer en base de données la série ayant l'id $id
        $serie = $serieRepository->find($id); // Select * FROM serie WHERE id= $id

        if ($serie === null){
            throw $this->createNotFoundException("Cette série n'existe pas !");
        }

        return $this->render('serie/show.html.twig', ['serie' => $serie ]);
    }



    /**
     * @Route("/new", name="serie_new")
     */
    public function new(): Response
    {
       /**$serie = new Serie();
       $serie->setName("Goncharov");
       // ect...

        dump($serie);
        $entityManager->persist($serie);
        $entityManager->flush();*/


       return $this->render('serie/new.html.twig');
    }
}
