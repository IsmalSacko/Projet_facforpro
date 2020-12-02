<?php

namespace App\Controller;

use App\Entity\Aad;
use App\Repository\AadRepository;
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
     * @param AadRepository $repository
     * @return Response
     */
    public function accueil(AadRepository $repository){
        $titre ="Bienvenue sur la page de mon Agence de location";

        return $this->render('home/index.html.twig', [
          'titre'  => $titre,
            'ads' => $repository->findAll()
        ]);
    }
    /**
     * @Route ("/projets_realises", name="projets_realises-index")
     */
    public function projet() : Response{
        return $this->render('home/projet.html.twig');
    }

    /**
     * @Route("/upload", name="upload")
     */
    public function image(){
        return $this->render('upload.html.twig');
    }
    /**
     * @Route ("/dev-web", name="dev-wev_index")
     */
        public function dev_web(){
        return $this->render('home/dev_web.html.twig');
    }
}
