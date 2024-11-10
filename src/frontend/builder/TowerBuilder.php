<?php
declare(strict_types=1);

namespace App;

/**
 * TowerBuilder является фабрикой для постройки разных башен для их отрисовки
 */
class TowerBuilder extends EntityValuer
{
    public $towerLevel;
    private $array = [];
    private $finalArray;
    private $arrayForTowers;
    private $arrayForConnectionTowersWithKeyboard;
    public function __construct(
        int $towerLevel = null,
        array $array = null,
        array $finalArray = null,
        array $arrayForTowers = null
    ) {
        $this->towerLevel = $towerLevel ?? 1;
        $this->array = $array ?? [];
        $this->finalArray = $finalArray ?? [];
        $this->arrayForTowers = $arrayForTowers ?? [];
    }
    public function setTowerLevel(int $towerLevel)
    {
        $this->towerLevel = $towerLevel;
    }
    public function getTowerLevel()
    {
        return $this->towerLevel;
    }
    public function setFinalArray($finalArray): void
    {
        $this->finalArray = $finalArray;
    }
    public function getFinalArray(): array
    {
        return $this->finalArray;
    }
    public function createTowers(): void
    {
        $count = 3;
        for ($i = 0; $i < $count; $i++) {
            $this->arrayForTowers[] = $this->array;
        }
    }
    public function getCreatedTowers(): array
    {
        return $this->arrayForTowers;
    }
    public function buildTower(array $array): array
    {
        $this->array = $array;
        $this->finalArray = $this->array;
        return $this->finalArray ?? [];
    }
    public function setTowersWithInputKeyboard(array $inputArray, int $key): void
    {
        $this->arrayForConnectionTowersWithKeyboard[$key] = $inputArray;
    }
    public function getTowersWithInputKeyboard(): array
    {
        return $this->arrayForConnectionTowersWithKeyboard;
    }
    public function createTowerWithOrWithoutDisks(int $countOfDisks, int $commonHeight): array
    {
        if ($countOfDisks >= $this->towerLevel) {
            $countOfDisks = $this->towerLevel;
        }
        if ($countOfDisks > 0) {
            for ($i = 0; $i < $countOfDisks; $i++) {
                if ($i === 0) {
                    array_push($this->array, self::createDisk());
                } else {
                    array_push($this->array, self::createBlock());
                    array_push($this->array, self::createDisk());
                }
            }
            for (; $i <= $commonHeight; $i++) {
                if ($i === 0) {
                    array_push($this->array, self::createBlock());
                } else {
                    array_push($this->array, self::createBlock());
                    array_push($this->array, self::createReplacementOfDisk());
                }
            }
        }
        if ($countOfDisks === 0) {
            for ($i = 0; $i <= $this->towerLevel; $i++) {
                if ($i === 0) {
                    array_push($this->array, self::createBlock());
                } else {
                    array_push($this->array, self::createBlock());
                    array_push($this->array, self::createReplacementOfDisk());
                }
            }
        }
        return $this->array;
    }
    public function create(): object
    {
        return new TowerBuilder($this->towerLevel);
    }
}
