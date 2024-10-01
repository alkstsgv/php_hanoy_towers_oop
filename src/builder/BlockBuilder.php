<?php

declare(strict_types=1);

namespace App;
use Dotenv;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class BlockBuilder implements CreateFigureInterface
{
    private $width;
    private $height;
    private $tower = [];
    public function setWidth(int $width)
    {
        $this->width = $width;
    }
    public function getWidth(): int
    {
        return $this->width;
    }
    public function setHeight(int $height)
    {
        $this->height = $height;
    }
    public function getHeight(): int
    {
        return $this->height;
    }
    public function setTower(array $tower)
    {
        $this->tower = $tower;
    }
    public function getTower(): array
    {
        return $this->tower;
    }

    public function createFigure(int $width, int $height, array $tower = []): array
    {
        $this->width = $width;
        $this->height = $height;
        $this->tower = $tower;

        for ($i = 0; $i <= $height; $i++) {
            if ($width === 0 || $height === 0) {
                break;
            }
            if ($i <= $height) {
                $this->tower[] = str_repeat($_ENV['VERT_BAR'], $this->width) ;
            }
        }
        return $this->tower;
    }
    public function getBlock(): array
    {
        $block = new BlockBuilder();
        $block->createFigure((int)$_ENV['BLOCK_WIDTH'], (int)$_ENV['BLOCK_HEIGHT']);
        return $block->getTower();
    }
    public function getReplacementOfDisk(): array
    {
        $this->tower = self::createFigure((int)$_ENV['BLOCK_WIDTH'], (int)$_ENV['DISK_HEIGHT']);
        return $this->tower;
    }
}
