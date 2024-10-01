<?php

declare(strict_types=1);

namespace App;

// use App\PropsForBuilder as PFB;
use Dotenv;
// use App\PropsForBuilder as PFB;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class DiskBuilder implements CreateFigureInterface
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
            if ($width === 0) {
                break;
            }
            if ($i == 0) {
                $this->tower[] = $_ENV['WHITESPACE'] . str_repeat($_ENV['UNDERLINING'], $this->width);
            } elseif ($i == $height) {
                $this->tower[] = $_ENV['VERT_BAR'] . str_repeat($_ENV['UNDERLINING'], $this->width) . $_ENV['VERT_BAR'];
            }
        }
        return $this->tower;
    }
    public function getDisk(): array
    {
        $disk = new DiskBuilder();
        $disk->createFigure((int)$_ENV['DISK_WIDTH'], (int)$_ENV['DISK_HEIGHT']);
        return $disk->getTower();
    }
}
