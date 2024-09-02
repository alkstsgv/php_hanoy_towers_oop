<?php
declare(strict_types=1);

require '../../vendor/autoload.php';
use App;

$disk = new App\DiskBuilder();
print_r($disk->createFigure(10, 1));

$tower = new App\TowerBuilder();
print_r($tower->createFigure(10, 7));
