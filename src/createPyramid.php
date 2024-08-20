<?php
declare(strict_types=1);

interface TowerInterface
{
    public function createTower(array $arr);
    public function setLevel(string $level);    
} 

interface ChooseTower extends TowerInterface
{
    public function chooseTower(array $arr);

}

class TowerMaker implements ChooseTower {
    public function createTower(array $arr)
    {
        
    }
    public function setLevel(string $level)
    {

    }
    public function chooseTower(array $arr)
    {

    }
   
}