<?php

declare(strict_types=1);

namespace App;

class TowerWithoutDisks extends Fabric
{
    public static function createTowerWithoutDisks(int $towerLevel): array
    {
        $array = [];
        for ($i = 0; $i < $towerLevel; $i++) {
            if ($i === 0) {
                array_push($array, self::createBlock());
            } else {
                array_push($array, self::createReplacementOfDisk());
                array_push($array, self::createBlock());
            }
        }
        return $array;
    }
}
