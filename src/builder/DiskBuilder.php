<?php

declare(strict_types=1);

namespace App;

use Dotenv;

// require '../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class DiskBuilder implements CreateFigureInterface
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
        $this->width = $width ?? (int)$_ENV['DISK_WIDTH'];
        $this->height = $height ?? (int)$_ENV['DISK_HEIGHT'];
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
            if ($this->width === 0) {
                break;
            }
            if ($i === 0) {
                $this->tower[] = $_ENV['WHITESPACE'] . str_repeat($_ENV['UNDERLINING'], (int)$this->width);

            } elseif ($i === $this->height) {

                $this->tower[] = $_ENV['VERT_BAR'] . str_repeat($_ENV['UNDERLINING'], (int)$this->width) . $_ENV['VERT_BAR'];
            }

        }
        return $this->tower;
    }
    public function getDisk(): array
    {
        $newDisk = (new DiskBuilder())->createFigure($this->width, $this->height, $this->tower);
        // $newDisk = new DiskBuilder();
        return $newDisk;
    }
}

// $t = new DiskBuilder();
// $t1 = $t->getDisk();
// print_r($t1->createFigure(25,5,[]));
// $t->createFigure();
// $t->getDisk();
// print_r($t->getDisk());
// $t->createFigure();
// print_r($t->getTower());