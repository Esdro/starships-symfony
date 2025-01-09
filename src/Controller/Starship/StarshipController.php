<?php

namespace App\Controller\Starship;

use App\Model\StarShip;
use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/')]
class StarshipController extends AbstractController
{

    #[Route('/', name: 'app_starship_all', methods: ['GET'])]
    public function getCollections(StarshipRepository $starshipRepository): Response
    {

        $data = $starshipRepository->findAllStarship();
        $myShip = $data[array_rand($data)];

        return $this->render('main/homepage.html.twig', [
            'ships' => $data,
            'myShip' => $myShip
        ]);
    }


    #[Route('/ships/{id<\d+>}', name: 'app_starship_show', methods: ['GET'])]
    public function show(int $id, StarshipRepository $repository): Response
    {

        $ship = $repository->find($id);

        if (!$ship) {
            throw $this->createNotFoundException(" None starship found with #ID '$id' ");
        }

        return $this->render('starship/show.html.twig', [
            'ship' => $ship
        ]);
    }

}