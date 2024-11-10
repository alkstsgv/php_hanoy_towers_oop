<?php
declare(strict_types=1);

namespace App;
use App\BlockBuilder;
use App\TowerBuilder;
use App\DiskBuilder;

/**
 * Class EntityValuer создает сущности, т.е. своеобразная фабрика
 */
class EntityValuer
{
    protected static function createBlock(): array
    {
        $block = new BlockBuilder();
        $tower = new TowerBuilder();
        $tower->buildTower($block->getBlock());
        return $tower->getFinalArray();
    }
    protected static function createDisk(): array
    {

        $disk = new DiskBuilder();
        $tower = new TowerBuilder();
        $tower->buildTower($disk->getDisk());
        return $tower->getFinalArray();
    }
    protected static function createReplacementOfDisk(): array
    {
        $block = new BlockBuilder();
        $tower = new TowerBuilder();
        $tower->buildTower($block->getReplacementOfDisk());
        return $tower->getFinalArray();
    }
}
