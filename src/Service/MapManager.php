<?php
namespace App\Service;
use App\Repository\TileRepository;

class MapManager 
{
     

    
    public function __construct(private TileRepository $tileRepository)
    {
        $this->tileRepository = $tileRepository;
    }

    
    public function tileExists(int $x,int $y) : bool
    {


        //je recupère les coordonnées du tile
        $tile = $this->tileRepository->findOneBy(['coordX'=>$x,'coordY'=>$y]);

        //je vérifie s'il y a des coordonnées et je renvoie un bool
        return $tile ? true : false ;
    }
    // public function getRandomIslands(int $x,int $y) : bool
    // {
    // }


}