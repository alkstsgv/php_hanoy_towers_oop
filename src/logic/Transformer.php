<?php

declare(strict_types=1);

namespace App;

class Transformer
{
    private $towerWithDisks = [];
    private $towerWithoutDisks = [];
    private $towerWithoutDisks2 = [];
    private $mergedArrays = [];
    public function setTowerWithDisks($towerWithDisks): void
    {
        $this->towerWithDisks = $towerWithDisks;
    }
    public function setTowerWithoutDisks($towerWithoutDisks): void
    {
        $this->towerWithoutDisks = $towerWithoutDisks;
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
    public function getTowerWithoutDisks(): array
    {
        return $this->towerWithoutDisks;
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
                $this->towerWithoutDisks,
                $this->towerWithoutDisks2
            ];
        return $this->mergedArrays;
    }
}


// $transformer = new Transformer();
// $transformer->setTowerWithDisks(TowerWithDisks::createTowerWithDisks(3));
// $transformer->setTowerWithoutDisks(TowerWithoutDisks::createTowerWithoutDisks(3));
// $transformer->setTowerWithoutDisks2(TowerWithoutDisks::createTowerWithoutDisks(3));
// // print_r($transformer->mergeTowersToOneArray());
// print_r($transformer);
