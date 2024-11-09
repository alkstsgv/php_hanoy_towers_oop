<?php

declare(strict_types=1);

namespace App;


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

    public function trullyMoveDisk(array $array, int $firstPeg, int $secondPeg): array
    {
        foreach ($array as $key => $value) {
            foreach ($value as $k => $v) {
                if (($key === $firstPeg) && (!empty($array[$key][$k]))) {
                    if (count($value) === 1) {
                        $this->middleArr[key($value)] = array_shift($array[$firstPeg]);
                    } elseif (count($value) > 1) {
                        $this->middleArr[max(array_keys($value))] = array_pop($array[$firstPeg]);
                    } elseif (count($value) === 0) {
                        break 2;
                    }
                    ksort($array[$firstPeg]);
                    ksort($array[$secondPeg]);
                    ksort($this->middleArr);
                    if (empty($array[$secondPeg])) {
                        $array[$secondPeg][key($this->middleArr)] = array_pop($this->middleArr);
                        break 2;
                    }
                    if (!empty($array[$secondPeg])) {
                        $maxFirstPeg = array_keys($this->middleArr);
                        $maxSecondPeg = array_keys($array[$secondPeg]);
                        if (max($maxFirstPeg) > max($maxSecondPeg)) {
                            $array[$secondPeg][key($this->middleArr)] = array_pop($this->middleArr);
                            break 2;
                        } elseif (max($maxFirstPeg) < max($maxSecondPeg)) {
                            $array[$firstPeg][key($this->middleArr)] = array_pop($this->middleArr);
                            break 2;
                        }
                        continue 2;
                    }
                }
            }
        }
        return $this->arr = $array;
    }
}
