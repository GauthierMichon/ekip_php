<?php

namespace App\Controller;

use App\Entity\Offres;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {

        $Offres = $this->getDoctrine()
            ->getRepository(Offres::class)
            ->findAll();


        return $this->render('home/index.html.twig', [
            'offres' => $Offres,
        ]);
    }

    /**
     * @Route("/offre/{id}", name="show_post")
     */
    public function show(Offres $offre)
    {
        return $this->render('home/offre.html.twig', [
            'offre' => $offre
        ]);
    }
}
