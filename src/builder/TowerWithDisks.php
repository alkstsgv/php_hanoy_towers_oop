<?php
declare(strict_types=1);
namespace App;


class TowerWithDisks extends EntityManager
{

    public static function createTowerWithDisks(int $towerLevel):array {
        $array = [];
        for ($i = 0; $i < $towerLevel; $i++) {
            if ($i === 0) {
                array_push($array, EntityManager::createBlock());    
            } else {
                array_push($array, EntityManager::createDisk());
                array_push($array, EntityManager::createBlock());
            }
        }
        return $array;
    }
}

