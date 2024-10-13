<?php

declare(strict_types=1);

namespace App;

use Bin;
use Exception;

// require '../../vendor/autoload.php';
class Replacer
{
    private $arr;
    private $middleArr;
    private $changedArray;

    public function __construct(
        array $arr = [],
        array $middleArr = []
    ) {
        $this->arr = $arr ?? [];
        $this->middleArr = $middleArr ?? [];
    }
    public function setArray(array $array, int $key): void
    {
        $this->arr[$key] = $array;
    }
    public function getArray(): array
    {
        return $this->arr;
    }

    public function getChangedArray(): array
    {
        return $this->changedArray;
    }

    public function moveDisk(array $array): array
    {
        $arrayKeys = [];
        foreach ($array as $key => $value) {
            $arrayKeys[] = $key;
        }

        // $ar1 = [(int)current($arrayKeys) => $array[current($arrayKeys)]];
        // $ar2 = [(int)next($arrayKeys) => $array[next($arrayKeys)]];
        // $ar3 = [(int)next($arrayKeys) => $array[end($arrayKeys)]];
        foreach ($array as $k => $v) {
            if ($array[$arrayKeys[0]][$k] === $array[$arrayKeys[1]][$k]) {
                $this->middleArr[] = $array[$arrayKeys[0]][$k];
                $this->middleArr[] = $array[$arrayKeys[1]][$k];
                unset($array[$arrayKeys[0]][$k], $array[$arrayKeys[1]][$k]);
            } else {
                $this->middleArr[] = array_shift($array[$arrayKeys[0]]);
                $this->middleArr[] = array_shift($array[$arrayKeys[1]]);
                array_unshift($array[$arrayKeys[0]], array_pop($this->middleArr));
                array_unshift($array[$arrayKeys[1]], array_pop($this->middleArr));
                break;
            }
        }
        for ($i = 0; $i <= count($this->middleArr); $i++) {
            array_unshift($array[$arrayKeys[0]], array_pop($this->middleArr));
            array_unshift($array[$arrayKeys[1]], array_pop($this->middleArr));
        }
        return $this->changedArray = [
            $arrayKeys[0] => $array[$arrayKeys[0]],
            $arrayKeys[1] => $array[$arrayKeys[1]],
            $arrayKeys[2] => $array[$arrayKeys[2]]
        ];
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
