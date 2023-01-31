<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        //Fonction Twig
        return $this->render('home/index.html.twig', [ //Chemin du template
            'controller_name' => 'HomeController', //tableau associatif
            'test' => 'Top',
            'produits' => ['Ps5', 'Switch', 'XBox', 'PC'],
            'client' => ['nom' => 'Bob', 'prenom' => 'Bobby'],
            'liste' => [
                'client1' => [
                    'nom' => 'Bros',
                    'prenom' => 'Mario'
                ],
                'client2' => [
                    'nom' => 'Princesse',
                    'prenom' => 'Peach'
                ],
            ]
        ]);
    }



    #[Route('/test', name: 'app_test')] // Nouvelle route
    public function tester(): Response
    {
        $value = ["nom" => "Etchebest", "prenom" => "Philippe"];
        $r = new JsonResponse($value);
        return $r; //Fonction JSON
    }
}
