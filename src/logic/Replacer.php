<?php

declare(strict_types=1);

namespace App;

// use App\TowerWithDisks;
// use App\TowerWithoutDisks;
// require '../../vendor/autoload.php';


class Replacer
{
    private $arr1;
    private $arr2;
    public $middleArr;

    public function __construct(array $arr1, array $arr2)
    {
        $this->arr1 = $arr1;
        $this->arr2 = $arr2;
    }
    public function getMiddleArr(): array
    {
        return $this->middleArr;
    }
    public function getArr1(): array
    {
        return $this->arr1;
    }

    public function getArr2(): array
    {
        return $this->arr2;
    }

    public function getFinalArr()
    {
        return $this->moveDisk();
    }

    public function moveDisk()
    {
        if ($this->arr1 !== $this->arr2) {
            foreach ($this->arr1 as $k => $v) {
                if (end($this->arr1) === end($this->arr2)) {
                    $this->middleArr[] = array_pop($this->arr1);
                    $this->middleArr[] = array_pop($this->arr2);
                    continue;
                } else {
                    if (end($this->arr1) !== $this->arr1[0]) {
                        $this->middleArr[] = array_pop($this->arr1);
                        $this->arr2[] = array_pop($this->middleArr);
                    }
                    for ($i = 0; $i <= count($this->middleArr); $i++) {
                        $this->arr2[] = array_pop($this->middleArr);
                        $this->arr1[] = array_pop($this->middleArr);
                    }
                    break;
                }
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

// // // print_r( $arr1[0] !== $arr2);

// $replacer = new Replacer($arr1, $arr2);
// // print_r( $replacer->$arr1[0]);
// print_r($replacer->getArr1());
// print_r($replacer->getArr2());
// $replacer->moveDisk();
// print_r($replacer->getArr1());
// print_r($replacer->getArr2());
// $replacer->moveDisk();
// $replacer = new Replacer($arr2, $arr1);
// $replacer->moveDisk();
// print_r($replacer->getArr1());
// print_r($replacer->getArr2());
// // print_r(TowerWithoutDisks::createTowerWithoutDisks(1));
