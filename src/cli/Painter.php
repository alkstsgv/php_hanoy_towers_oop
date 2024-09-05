<?php

declare(strict_types=1);

require '../../vendor/autoload.php';

use App\BlockBuilder;
use App\DiskBuilder;

class Painter 
{
    public $arr = [];
    public function getDisk(): array
    {
        $disk = new DiskBuilder();
        $disk->createFigure(10, 1);
       return $disk->getCreatedFigure();
    }

    public function getBlock()
    {
        $block = new BlockBuilder();
        $block->createFigure(10, 3);
       return $block->getCreatedFigure();
    }
    /**
     * Undocumented function
     *
     * @param array $arr
     * @return array
     */
    // TODO эта функция может агрегировать диск и блок.
    // TODO Через эту функцию нужно реализовать удаление и вставку элементов в массив.
    public function paintTower(array $arr): array 
    {
        $this->arr = $arr;
        foreach ($this->arr as $value) {
            $this->arr[] = $value;
        }
        return $arr;
    }

    public function getArr(){
        return $this->arr;
    }
}

$paint = new Painter();
print_r($paint->paintTower($paint->getBlock()));

print_r($paint->paintTower($paint->getDisk()));

