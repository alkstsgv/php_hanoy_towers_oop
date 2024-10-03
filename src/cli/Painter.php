<?php

declare(strict_types=1);

namespace App;

use Exception;

require '../../vendor/autoload.php';

class Painter
{
    public $prefabricatedArray;
    public function setPrefabricatedArray($prefabricatedArray): void
    {
        if (empty($prefabricatedArray)) {
            throw new Exception("Массив в Painter.php пустой");
        }
        $this->prefabricatedArray = $prefabricatedArray;
    }

    public function getPrefabricatedArray(): array
    {
        return $this->prefabricatedArray;
    }

    public function paintToCli(): void
    {
        // $this->prefabricatedArray = array_reverse($this->prefabricatedArray);
        [$array1, $array2, $array3] = $this->prefabricatedArray;
        foreach ($array1 as $key => $value) {
            foreach ($value as $k => $str) {
                $left = str_pad($str, 50, " ", STR_PAD_BOTH);
                $middle = str_pad($array2[$key][$k], 50, " ", STR_PAD_BOTH);
                $right = str_pad($array3[$key][$k], 50, " ", STR_PAD_BOTH) . PHP_EOL;
                print_r($left . $middle . $right);
            }
        }
    }
}

$towerWithDisks = new TowerWithDisks();
$arr1 = $towerWithDisks->createTowerWithDisks(3);

$towerWithout = new TowerWithoutDisks();
$arr2 = $towerWithout->createTowerWithoutDisks(3);

$towerWithout2 = new TowerWithoutDisks();
$arr3 = $towerWithout2->createTowerWithoutDisks(3);


$replacer = new Replacer($arr1, $arr2);

// print_r($replacer->getArr2());
$replacer->moveDisk();

// $replacer = new Replacer($arr1, $arr3);
// $replacer->moveDisk();
// print_r($replacer->getArr2());
$painter = new Painter();
$transformer = new Transformer();

// print_r($replacer->getArr1());
// print_r($replacer->getArr2());


// $transformer->setTowerWithDisks(TowerWithDisks::createTowerWithDisks(3));
$transformer->setTowerWithDisks($replacer->getArr1());

// // var_dump($transformer->getTowerWithDisks());
// $transformer->setTowerWithoutDisks(TowerWithoutDisks::createTowerWithoutDisks(3));
$transformer->setTowerWithoutDisks($replacer->getArr2());
// $transformer->setTowerWithoutDisks2(TowerWithoutDisks::createTowerWithoutDisks(3));
$transformer->setTowerWithoutDisks2($arr3);

// // $transformer->mergeTowersToOneArray();
$painter->setPrefabricatedArray($transformer->mergeTowersToOneArray());

$painter->paintToCli();
// $replacer = new Replacer(self::getArr2(),self::getArr1() );
// $replacer->moveDisk();
// $painter->paintToCli();
