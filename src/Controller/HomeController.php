<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="agence")
     */
    public function index():Response    {
        return $this->render('home/index.html.twig', [
            'titre' => 'Bienvenue | Agence',
        ]);
    }
    /**
     * @Route("/home", name="home")
     */
    public function accueil(){
        $titre ="Bienvenue sur la page de mon Agence de location";

        return $this->render('home/index.html.twig', [
          'titre'  => $titre
        ]);
    }

    /**
     * @Route("/upload", name="upload")
     */
    public function image(){
        return $this->render('upload.html.twig');
    }
}
