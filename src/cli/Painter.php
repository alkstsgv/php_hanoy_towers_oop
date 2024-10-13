<?php

declare(strict_types=1);

namespace App;

use Exception;

require '../../vendor/autoload.php';

class Painter
{
    public $prefabricatedArray;
    public function __construct(array $prefabricatedArray = null) {
        $this->prefabricatedArray = $prefabricatedArray ?? [];
    }
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
        [$array1, $array2, $array3] = $this->prefabricatedArray;
        foreach ($array1 as $key => $value) {
            foreach ($value as $k => $str) {
                $array2[$key][$k] = $array2[$key][$k] ?? $array2[$key][0];
                $array3[$key][$k] = $array3[$key][$k] ?? $array3[$key][0];
                $left = str_pad($str, 50, " ", STR_PAD_BOTH);
                $middle = str_pad($array2[$key][$k], 50, " ", STR_PAD_BOTH);
                $right = str_pad($array3[$key][$k], 50, " ", STR_PAD_BOTH) . PHP_EOL;
                print_r($left . $middle . $right);
            }
        }
    }
}

// $towerWithDisks = new TowerBuilder(3);
// $arr1 = $towerWithDisks->createTowerWithDisks();

// $towerWithout = new TowerBuilder(3);
// $arr2 = $towerWithout->createTowerWithoutDisks();

// $towerWithout2 = new TowerBuilder(3);
// $arr3 = $towerWithout2->createTowerWithoutDisks();


// $replacer = new Replacer($arr1, $arr2);

// $replacer->moveDisk();

// $painter = new Painter();
// $transformer = new Transformer($arr1, $arr2,$arr3);
// $transformer->setTowerWithDisks($replacer->getArr1());

// $transformer->setTowerWithoutDisks($replacer->getArr2());

// $transformer->setTowerWithoutDisks2($arr3);

// $painter->setPrefabricatedArray($transformer->mergeTowersToOneArray());

// $painter->paintToCli();
