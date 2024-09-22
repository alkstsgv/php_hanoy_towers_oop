<?php
declare(strict_types=1);
namespace App;

class TowerWithoutDisks extends EntityManager
{
    public function createTowerWithoutDisks(int $towerLevel) {
            $test = [];
            for ($i = 0; $i < $towerLevel; $i++) {
                array_push($test, self::createBlock());
            }
            return $test;
        }
    
}