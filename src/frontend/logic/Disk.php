<?php
declare(strict_types=1);

namespace App;

class Disk
{
    public function initiateDisks(array $inputArray, int $countOfLevels, int $neededArrayKey): array
    {
        for ($i = 0; $i < $countOfLevels; $i++) {
            foreach ($inputArray as $key => $value) {
                if ($key === $neededArrayKey) {
                    $inputArray[$key][] = "DISK";
                }
            }
        }
        return $inputArray;
    }
}
