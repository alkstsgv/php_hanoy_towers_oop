<?php

declare(strict_types=1);

namespace App;

use Exception;
use App\PropsForBuilder as PFB;

require '../../vendor/autoload.php';

class Painter
{
    public $prefabricatedArray;
    public function setPrefabricatedArray($prefabricatedArray)
    {
        if (empty($prefabricatedArray)) {
            throw new Exception("Массив в Painter.php пустой");
        }
        $this->prefabricatedArray = $prefabricatedArray;
    }

    public function getPrefabricatedArray()
    {
        return $this->prefabricatedArray;
    }

    public function paintToCli()
    {
        [$array1, $array2, $array3] = $this->prefabricatedArray;
        foreach ($array1 as $key => $value) {
            foreach ($value as $k => $str) {
                $left = str_pad($str, 50, " ", STR_PAD_BOTH);
                $middle = str_pad($array2[$key][$k], 50, " ", STR_PAD_BOTH);
                $right = str_pad($array3[$key][$k], 50, " ", STR_PAD_BOTH) . PHP_EOL;
                print_r($left . $middle . $right);
            }
        }



        foreach ($array2 as $key => $value) {
            foreach ($value as $k => $str) {
                $middle = str_pad($str, 50, " ", STR_PAD_BOTH) . PHP_EOL;
                // $right = str_pad($array3[$key][$k], 50, " ", pad_type: STR_PAD_BOTH) . PHP_EOL;
                // print_r(str_pad($middle, 50, $right, STR_PAD_BOTH)) . PHP_EOL;
                // print_r($middle . $right);
                // print_r($middle);
            }
        }
    }
}

$towerWithDisks = new TowerWithDisks();
$arr1 = $towerWithDisks->createTowerWithDisks(3);
// print_r( $arr1[0]);
// print_r(TowerWithoutDisks::createTowerWithoutDisks(1));
$towerWithout = new TowerWithoutDisks();
$arr2 = $towerWithout->createTowerWithoutDisks(3);

$towerWithout2 = new TowerWithoutDisks();
$arr3 = $towerWithout->createTowerWithoutDisks(3);
// // print_r( $arr1[0] !== $arr2);

$replacer = new Replacer($arr1, $arr2);
$replacer->moveDisk();

$painter = new Painter();
$transformer = new Transformer();
// $transformer->setTowerWithDisks(TowerWithDisks::createTowerWithDisks(3));
$transformer->setTowerWithDisks($arr1);
// // var_dump($transformer->getTowerWithDisks());
// $transformer->setTowerWithoutDisks(TowerWithoutDisks::createTowerWithoutDisks(3));
$transformer->setTowerWithoutDisks($arr2);
// $transformer->setTowerWithoutDisks2(TowerWithoutDisks::createTowerWithoutDisks(3));
$transformer->setTowerWithoutDisks2($arr3);

// print_r( $replacer->$arr1[0]);
// print_r($replacer->getArr1());
// print_r($replacer->getArr2());

// // $transformer->mergeTowersToOneArray();
$painter->setPrefabricatedArray($transformer->mergeTowersToOneArray());
// // var_dump($painter->getPrefabricatedArray());
// // var_dump($transformer);
// // $painter->paintToCli($transformer);
// // print_r($painter->getPrefabricatedArray());
$painter->paintToCli();
// var_dump($painter->getPrefabricatedArray());
