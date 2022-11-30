<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Tile;
use App\Repository\BoatRepository;
use App\Repository\TileRepository;

class MapController extends AbstractController
{
    #[Route('/map', name: 'map')]
    public function displayMap(BoatRepository $boatRepository, TileRepository $tileRepository): Response
    {
        $tiles = $tileRepository->findAll();

        foreach ($tiles as $tile) {
            $map[$tile->getCoordX()][$tile->getCoordY()] = $tile;
        }

        $boat = $boatRepository->findOneBy([]);
        $boatCoordX=$boat->getCoordX();
        $boatCoordY=$boat->getCoordY();
        $tile = $tileRepository->findOneBy(['coordX'=>$boatCoordX,'coordY'=> $boatCoordY]);

        return $this->render('map/index.html.twig', [
            'map'  => $map ?? [],
            'boat' => $boat,
            'tile'=> $tile
        ]);
    }
}