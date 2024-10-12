<?php

declare(strict_types=1);

namespace App;
// require '../../vendor/autoload.php';
/*
* Через этот класс можно получить массив с объектами как с дисками, так и без них
*
*/
class TowerBuilder extends EntityValuer
{
    public $towerLevel;
    private $array = [];
    private $finalArray;
    public function __construct(
        int $towerLevel = 1,
        array $array = null, 
        array $finalArray = null
        ) {
        $this->towerLevel = $towerLevel ?? 1;
        $this->array = $array ?? [];
        $this->finalArray = $finalArray ?? [];
    }

    public function setTowerLevel(int $towerLevel) {
        $this->towerLevel = $towerLevel;
    }
    public function getTowerLevel() {
        return $this->towerLevel;
    }
    public function setFinalArray($finalArray): void
    {
        $this->finalArray = $finalArray;
    }
    public function getFinalArray(): array
    {
        return $this->finalArray;
    }
    public function buildTower(array $array): array
    {
        $this->array = $array;
        $this->finalArray = $this->array;
        return $this->finalArray ?? [];
    }

    public function createTowerWithDisks(): array
    {
        for ($i = 0; $i < $this->towerLevel; $i++) {
            if ($i === 0) {
                array_push($this->array, self::createBlock());
            } else {
                array_push($this->array, self::createDisk());
                array_push($this->array, self::createBlock());
            }
        }
        return $this->array;
    }
    public function createTowerWithoutDisks(): array
    {
        for ($i = 0; $i < $this->towerLevel; $i++) {
            if ($i === 0) {
                array_push($this->array, self::createBlock());
            } else {
                array_push($this->array, self::createReplacementOfDisk());
                array_push($this->array, self::createBlock());
            }
        }
        return $this->array;
    }
    public function create(): object {
        return new TowerBuilder($this->towerLevel);
    }
}


// $t = new TowerBuilder(3);

// print_r($t->createTowerWithoutDisks());
// // print_r($t->createTowerWithDisks());
// $t1 = $t->create();
// $t1->setTowerLevel(5);
// print_r($t1->createTowerWithoutDisks());