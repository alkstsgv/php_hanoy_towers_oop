<?php

declare(strict_types=1);

namespace App;

use Dotenv;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class DiskBuilder implements CreateFigureInterface
{
    private $width;
    private $height;
    private $tower;
    private $array;
    /**
     * Class constructor.
     */
    public function __construct(
        int $width = null,
        int $height = null,
        array $tower = null,
        array $array = null
    ) {
        $this->width = $width ?? (int)$_ENV['DISK_WIDTH'];
        $this->height = $height ?? (int)$_ENV['DISK_HEIGHT'];
        $this->tower = $tower ?? [];
        $this->array = $array ?? [];
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
    public function initiateDisks(array $inputArray, int $countOfLevels, int $neededArrayKey): array
    {
        for ($i = 0;$i < $countOfLevels;$i++) {
            foreach ($inputArray as $inputKey => $inputValue) {
                if ($inputKey === $neededArrayKey) {
                    $inputArray[$inputKey][] = self::getDisk();
                }
            }
        }
        array_shift($inputArray[$neededArrayKey]);
        return $inputArray;
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
        return $newDisk;
    }
}
