<?php
namespace App\Services;
use App\Repository\TileRepository;

class MapManager 
{
    public function tileExists(int $x, int $y) : bool
    {

    //     if ($x < 0 || $x > 11 || $y <0 || $y >5)
    //     {
    //         return false;
    //     }
    //     return true;
    // }

        //je recupère les coordonnées du tile
        $tile = $this->tileRepository->findBy(['x'=>$x], ['y'=>$y]);

        //je vérifie s'il y a des coordonnées et je renvoie un bool
        if (empty($tile)){
            return false;
        }
        return true ;
    }

}