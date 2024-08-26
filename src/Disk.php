<?php
declare(strict_types=1);

interface DiskInterface {
    public function createDisk();
}

class DiskBuilder implements DiskInterface
{

    public function createDisk(): array
    {
        $arr = ["sdf"];

        return $arr;
    }
}


$disk = new DiskBuilder();
print_r($disk->createDisk(["test"]));