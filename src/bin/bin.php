<?php
declare(strict_types=1);

namespace App;
require '../../vendor/autoload.php';
use App\MiddleBack;
use App\Meeter;



(new Meeter())->showMeetingMessage();
$towerLevel = (int)readline("Введите желаемую высоту пирамиды: ");
$middleBack= new MiddleBack($towerLevel);
$middleBack->start();
