<?php
declare(strict_types=1);

interface TowerInterface {
    public function createTower();
}


class TowerBuilder implements TowerInterface
{
    public function createTower(): array
    {
        $tower = "";
        
        return [$tower];
    }
}
$tower = new TowerBuilder();
print_r($tower->createTower());