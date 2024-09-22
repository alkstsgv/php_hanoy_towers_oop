<?php

declare(strict_types=1);
namespace App;
use App\BlockBuilder;
use App\DiskBuilder;
use App\TowerBuilder;
use App\TowerWithDisks;
use App\TowerWithoutDisks;
require '../../vendor/autoload.php';



class EntityManager 
{
    public $towerLevel;
    protected function createBlock() {
        $block = new BlockBuilder();
        $tower = new TowerBuilder();
        $tower->buildTower($block->getBlock());
        return $tower->getFinalArray();
    }
    protected function createDisk() {
        $disk = new DiskBuilder();
        $tower = new TowerBuilder();
        $tower->buildTower($disk->getDisk());
        return $tower->getFinalArray();
    }

}


