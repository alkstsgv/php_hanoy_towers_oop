<?php

declare(strict_types=1);

namespace App;

class Painter
{
    public $prefabricatedArray;
    public $towerLevel;


    public function __construct(
        string $towerLevel = null,
        array $prefabricatedArray = null
    ) {
        $this->towerLevel = (int)$towerLevel ?? 1;
        $this->prefabricatedArray = $prefabricatedArray ?? [];

    }
    public function setPrefabricatedArray(string $prefabricatedArray): void
    {
            $this->prefabricatedArray = $prefabricatedArray;
    }

    public function getPrefabricatedArray(): string
    {
        return $this->prefabricatedArray;
    }

    /**
     * Функция для печати в строки массивов с дисками и таверами
     *
     * @return void
     */
    public function paintToCli(): void
    {

        $this->prefabricatedArray = json_decode($this->prefabricatedArray, true);
        [$array1, $array2, $array3] = $this->prefabricatedArray;

        krsort($array1);

        krsort($array2);
        krsort($array3);
        foreach ($array1 as $key => $value) {
            foreach ($value as $k => $str) {
                if (!isset($array2[$key][$k]) || !isset($array3[$key][$k])) {
                    continue;
                }
                $left = str_pad($str, 50, " ", STR_PAD_BOTH);
                $middle = str_pad($array2[$key][$k], 50, " ", STR_PAD_BOTH);
                $right = str_pad($array3[$key][$k], 50, " ", STR_PAD_BOTH) . PHP_EOL;
                print_r($left . $middle . $right);
            }
        }
    }
}
