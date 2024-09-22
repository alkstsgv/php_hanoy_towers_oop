<?php

declare(strict_types=1);
namespace App;

/*
* Через этот класс можно как построить пирамиду с дисками, так и без них
*
*/
class TowerBuilder
{
    public $array;
    protected $finalArray;
    protected $towerLevel;
    public function setFinalArray($finalArray) {
        $this->finalArray = $finalArray;
    }
    public function getFinalArray(): array {
        return $this->finalArray;
    }
//TODO доделать алгоритм создания пирамиды с дисками
    public function buildTower (array $array = []): array {
        $this->array = $array;
        $this->finalArray[] = $this->array;
        return $this->finalArray ?? [];
    }

}