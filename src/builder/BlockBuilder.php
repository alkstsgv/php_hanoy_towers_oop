<?php

declare(strict_types=1);

namespace App;

use Dotenv;

// require '../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class BlockBuilder implements CreateFigureInterface
{
    private $width;
    private $height;
    private $tower;
    /**
     * Class constructor.
     */
    public function __construct(
        int $width = null,
        int $height = null,
        array $tower = null
    ) {
        $this->width = $width ?? (int)$_ENV['BLOCK_WIDTH'];
        $this->height = $height ?? (int)$_ENV['BLOCK_HEIGHT'];
        $this->tower = $tower ?? [];
    }
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }
    public function getWidth(): int
    {
        return $this->width;
    }
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }
    public function getHeight(): int
    {
        return $this->height;
    }
    public function setTower(array $tower): void
    {
        $this->tower = $tower;
    }
    public function getTower(): array
    {
        return $this->tower;
    }

    public function createFigure(int $width, int $height, array $tower): array
    {
        for ($i = 0; $i <= $this->height; $i++) {
            if ($this->width === 0 || $this->height === 0) {
                break;
            }
            if ($i <= $this->height) {
                $this->tower[] = str_repeat($_ENV['VERT_BAR'], (int)$this->width) ;
            }
        }
        return $this->tower;
    }
    public function getBlock(): array
    {
        $newBlock = (new BlockBuilder())->createFigure($this->width, $this->height, $this->tower);
        return $newBlock;
    }
    public function getReplacementOfDisk(): array
    {
        $newReplacementBlock = (new BlockBuilder((int)$_ENV['BLOCK_WIDTH'], 1))->createFigure($this->width, $this->height, $this->tower);
        return $newReplacementBlock;
    }
}

// $t = new BlockBuilder();
// print_r($t->getBlock());
// print_r($t->getReplacementOfDisk());
