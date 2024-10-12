<?php

declare(strict_types=1);

use App\Meeter;
use App\Painter;
use App\Replacer;
use App\TowerBuilder;
use App\Transformer;

// use Dotenv\Parser\Value;

require '../../vendor/autoload.php';

final class Bin
{
    private $towerLevel;
    public $key;
    public function __construct(int $towerLevel = null)
    {
        $this->towerLevel = $towerLevel ?? 1;
    }
    public function start()
    {
        $meeter = new Meeter();
        $meeter->showMeetingMessage();
        $replacer = new Replacer();
        $this->towerLevel = (int)readline("Введите желаемую высоту пирамиды: ");
        $towerBuilder = new TowerBuilder($this->towerLevel);
        $towerWithDisks = ($towerBuilder)->create();
        $towerWithoutDisks1 = ($towerBuilder)->create();
        $towerWithoutDisks2 = ($towerBuilder)->create();
        $tower1 = $towerWithDisks->createTowerWithDisks();
        $tower2 = $towerWithoutDisks1->createTowerWithoutDisks();
        $tower3 = $towerWithoutDisks2->createTowerWithoutDisks();
        $transformer = new Transformer(
            $tower1,
            $tower2,
            $tower3
        );
        $arrays = $transformer->mergeTowersToOneArray();
        
        $painter = new Painter($transformer->getMergedArrays());
        // print_r($painter->getPrefabricatedArray());
        // $painter->redrawConsolePage();
        $painter->paintToCli();
        $meet = $meeter->choosePyramid();
        
        foreach ($meet as $key => $value) {
            foreach ($arrays as $k => $v) {
                if ($k === $value) {
                    $this->key[] = $k;
                    // print_r($k);
                    // print_r($arrays[$k]);
                    $replacer->setArray($arrays[$k], $k);

                    continue;
                }
            }
        }
        $ksortedArray = $replacer->getArray();
        // print_r($ksortedArray);
        $replacer->moveDisk($ksortedArray);
        $ch = $replacer->getChangedArray();
        ksort($ch);
        // print_r($ch);
        $painter->setPrefabricatedArray($ch);
        // print_r($painter->getPrefabricatedArray());
        // $painter->redrawConsolePage();
        $painter->paintToCli();
        // print_r($painter->getPrefabricatedArray());
        // print_r($arrays);
    }
}
$t = new Bin();
print_r($t->start());
