<?php

declare(strict_types=1);
namespace App;
use App\PropsForBuilder as PFB;
use App\CreateFigureInterface;


class BlockBuilder implements CreateFigureInterface
{
    private $width;
    private $height;
    private $tower = [];

    public function setWidth(int $width) {
        $this->width = $width;
    }
    public function getWidth(): int {
        return $this->width;
    }
    public function setHeight(int $height) {
        $this->height = $height;
    }
    public function getHeight(): int {
        return $this->height;
    }
    public function setTower(array $tower) {
        $this->tower = $tower;
    }
    public function getTower(): array {
        return $this->tower;
    }

    public function createFigure(int $width, int $height, array $tower = []): array
    {
        $this->width = $width;
        $this->height = $height;
        $this->tower = $tower;

        for ($i = 0; $i <= $height; $i++) {
            if ($width === 0 || $height === 0) {
                echo "длина и ширина должны быть больше нуля";
                break;
            }
            if ($i <= $height) {
                $this->tower[] = PFB::VERT_BAR . str_repeat(PFB::VERT_BAR, $this->width) . PFB::VERT_BAR . PHP_EOL;
            }
        }
        return $this->tower;
    }
    
    public function getBlock()
    {
        $block = new BlockBuilder();
        $block->createFigure(PFB::BLOCK_WIDTH, PFB::BLOCK_HEIGHT);
       return $block->getTower();
    }
}



// $block = new BlockBuilder();
// $block->createFigure(10,5);
// print_r($block->getTower());

// $block = new DiskBuilder();
// $block->createFigure(10);
// print_r($block->getTower());