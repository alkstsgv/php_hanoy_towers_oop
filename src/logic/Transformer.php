<?php

declare(strict_types=1);

namespace App;
// require '../../vendor/autoload.php';

class Transformer
{
    private $towerWithDisks;
    private $towerWithoutDisks1;
    private $towerWithoutDisks2 ;
    private $mergedArrays;

    public function __construct(
        array $towerWithDisks, 
        array $towerWithoutDisks1,
        array $towerWithoutDisks2
        ) {
        $this->towerWithDisks = $towerWithDisks;
        $this->towerWithoutDisks1 = $towerWithoutDisks1;
        $this->towerWithoutDisks2 = $towerWithoutDisks2;
    }
    public function setTowerWithDisks($towerWithDisks): void
    {
        $this->towerWithDisks = $towerWithDisks;
    }
    public function setTowerWithoutDisks($towerWithoutDisks1): void
    {
        $this->towerWithoutDisks1 = $towerWithoutDisks1;
    }
    public function setTowerWithoutDisks2($towerWithoutDisks2): void
    {
        $this->towerWithoutDisks2 = $towerWithoutDisks2;
    }
    public function setMergedArrays($mergedArrays): void
    {
        $this->mergedArrays = $mergedArrays;
    }
    public function getTowerWithDisks(): array
    {
        return $this->towerWithDisks;
    }
    public function getTowerWithoutDisks1(): array
    {
        return $this->towerWithoutDisks1;
    }
    public function getTowerWithoutDisks2(): array
    {
        return $this->towerWithoutDisks2;
    }
    public function getMergedArrays(): array
    {
        return $this->mergedArrays;
    }
    public function mergeTowersToOneArray(): array
    {
        
        $this->mergedArrays =
        [
                $this->towerWithDisks,
                $this->towerWithoutDisks1,
                $this->towerWithoutDisks2
            ];
        return $this->mergedArrays;
    }
}

// $towerWithDisks = new TowerWithDisks(3); 
// $towerWithoutDisks = new TowerWithoutDisks(3); 
// $towerWithoutDisks2 = new TowerWithoutDisks(3); 

// print_r($transformer = (new Transformer($towerWithDisks, $towerWithoutDisks, $towerWithoutDisks2)));
// print_r($transformer->mergeTowersToOneArray());

// $transformer = new Transformer();
// $transformer->setTowerWithDisks(TowerWithDisks::createTowerWithDisks(3));
// $transformer->setTowerWithoutDisks(TowerWithoutDisks::createTowerWithoutDisks(3));
// $transformer->setTowerWithoutDisks2(TowerWithoutDisks::createTowerWithoutDisks(3));
// // print_r($transformer->mergeTowersToOneArray());
// print_r($transformer);


        //     $towerBuilder = new TowerBuilder(3);
        //     // $this->meeter->showMeetingMessage();
        //     $towerWithDisks = ($towerBuilder)->create();
        //     $towerWithDisks->setTowerLevel(3);
        //     $towerWithoutDisks1 = ($towerBuilder)->create();
        //     $towerWithoutDisks1->setTowerLevel(3);
        //     $towerWithoutDisks2 = ($towerBuilder)->create();
        //     $towerWithoutDisks2->setTowerLevel(3);
            
        //     // $tower2 = $towerBuilder->createTowerWithoutDisks();
        //     // $tower3 = $towerBuilder->createTowerWithoutDisks();
        //     // print_r($towerWithoutDisks1->createTowerWithoutDisks());
        //     $transformer = new Transformer(
        //     $towerWithDisks->createTowerWithDisks(),
        //     $towerWithoutDisks1->createTowerWithoutDisks(),
        //     $towerWithoutDisks2->createTowerWithoutDisks()
        // );
        //     $transformer->mergeTowersToOneArray();
       
            // $prefabricatedArray = $transformer->getMergedArrays();