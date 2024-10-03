<?php

declare(strict_types=1);

namespace App;

require '../../vendor/autoload.php';
class Replacer
{
    private $arr1;
    private $arr2;
    private $middleArr;

    public function __construct(array $arr1, array $arr2)
    {
        $this->arr1 = $arr1;
        $this->arr2 = $arr2;
    }
    public function setArr1($arr1): void
    {
        $this->arr1 = $arr1;
    }
    public function getArr1(): array
    {
        return $this->arr1;
    }
    public function setArr2($arr2): void
    {
        $this->arr2 = $arr2;
    }
    public function getArr2(): array
    {
        return $this->arr2;
    }
    public function moveDisk(): void
    {
        if ($this->arr1 !== $this->arr2) {
            foreach ($this->arr1 as $k => $v) {
                if ($this->arr1[$k] === $this->arr2[$k]) {
                    $this->middleArr[] = $this->arr1[$k];
                    $this->middleArr[] = $this->arr2[$k];
                    unset($this->arr1[$k], $this->arr2[$k]);
                } else {
                    $this->middleArr[] = array_shift($this->arr1);
                    $this->middleArr[] = array_shift($this->arr2);
                    array_unshift($this->arr1, array_pop($this->middleArr));
                    array_unshift($this->arr2, array_pop($this->middleArr));
                    break;
                }

            }
            for ($i = 0; $i <= count($this->middleArr); $i++) {
                array_unshift($this->arr1, array_pop($this->middleArr));
                array_unshift($this->arr2, array_pop($this->middleArr));
            }

        }
    }
}

// $towerWithDisks = new TowerWithDisks();
// $arr1 = $towerWithDisks->createTowerWithDisks(3);
// // print_r( $arr1[0]);
// // print_r(TowerWithoutDisks::createTowerWithoutDisks(1));
// $towerWithout = new TowerWithoutDisks();
// $arr2 = $towerWithout->createTowerWithoutDisks(3);
// $arr3 = $towerWithout->createTowerWithoutDisks(3);
// $towerWithout = new TowerWithoutDisks();

// // // print_r( $arr1[0] !== $arr2);

// $replacer = new Replacer($arr1, $arr2);
// // print_r( $replacer->$arr1[0]);
// print_r($replacer->getArr1());
// print_r($replacer->getArr2());
// $replacer->moveDisk();
// print_r($replacer->getArr1());
// print_r($replacer->getArr2());
// $replacer->moveDisk();

// $replacer1 = new Replacer($replacer->getArr2(), $replacer->getArr1());

// $replacer1 = new Replacer($replacer->getArr2(), $replacer->getArr1());
// print_r($replacer1->getArr1());
// print_r($replacer1->getArr2());
// $replacer1->moveDisk();
// print_r($replacer1->getArr1());
// print_r($replacer1->getArr2());

// // print_r(TowerWithoutDisks::createTowerWithoutDisks(1));
