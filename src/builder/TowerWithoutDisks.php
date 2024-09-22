<?php
declare(strict_types=1);
namespace App;

class TowerWithoutDisks extends EntityManager
{
    public static function createTowerWithoutDisks(int $towerLevel):array {
            $array = [];
            for ($i = 0; $i < $towerLevel; $i++) {
                array_push($array, self::createBlock());
            }
            return $array;
        }
}
