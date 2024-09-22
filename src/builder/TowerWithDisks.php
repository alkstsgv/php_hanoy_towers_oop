<?php
declare(strict_types=1);
namespace App;


class TowerWithDisks extends EntityManager
{

    public function createTowerWithDisks(int $towerLevel) {
        $test = [];
        for ($i = 0; $i < $towerLevel; $i++) {
            if ($i === 0) {
                array_push($test, self::createBlock());    
            } else {
                array_push($test, self::createDisk());
                array_push($test, self::createBlock());
            }
        }
        return $test;
    }
}

