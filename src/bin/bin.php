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
    // public $key;
    private $meeter;
    private $towerBuilder;
    private $replacer;
    private $painter;

    public function __construct(
        int $towerLevel = null,
        $meeter = null,
        $towerBuilder = null,
        $replacer = null,
        $painter = null
    ) {
        $this->towerLevel = $towerLevel ?? 1;
        $this->meeter = new Meeter();
        $this->towerBuilder = new TowerBuilder();
        $this->replacer = new Replacer();
        $this->painter = new Painter();

    }
    public function start()
    {
        // $meeter = new Meeter();
        $this->meeter->showMeetingMessage();
        $this->towerLevel = (int)readline("Введите желаемую высоту пирамиды: ");
        $this->towerBuilder->__construct($this->towerLevel);
        $this->meeter->redrawConsolePage();


        // $towerBuilder = new TowerBuilder($this->towerLevel);
        $towerWithDisks = $this->towerBuilder->create();
        $towerWithoutDisks1 = $this->towerBuilder->create();
        $towerWithoutDisks2 = $this->towerBuilder->create();
        $tower1 = $towerWithDisks->createTowerWithDisks();
        $tower2 = $towerWithoutDisks1->createTowerWithoutDisks();
        $tower3 = $towerWithoutDisks2->createTowerWithoutDisks();
        $transformer = new Transformer($this->towerLevel);
        $mergedArrays = $transformer->mergeTowersToOneArray();
        // $painter = new Painter($transformer->getMergedArrays());
        $this->painter->__construct($transformer->getMergedArrays());
        $this->painter->paintToCli();
        $inputFromKeybord = $this->meeter->choosePyramid();

        /**
         * Анонимная функция нужна для матча введённых цифр с клавиатуры с конкретным Tower
         * @param array $meet Введённые с клавиатуры цифры
         * @param array $mergedArrays Полученные массивы, по которым будет идти матчинг
         * @return array 
         */
        $callback = function (array $inputFromKeybord, array $mergedArrays): void  {
            foreach ($inputFromKeybord as $key => $value) {
                foreach ($mergedArrays as $k => $v) {
                    if ($k === $value) {
                        $this->replacer->setArray($mergedArrays[$k], $k);
                        continue;
                    }
                }
            }

        };
        $callback($inputFromKeybord, $mergedArrays);
        // $arr = $this->replacer->getArray();
// print_r($arr);
        /**
         * Анонимная функция, которая меняет значения в массивах, и печатает массивы затем
         * @param array $array 
         */
        $callback2 = function (array $array) {
            // $this->meeter->redrawConsolePage();
            // print_r($array);
            $this->replacer->moveDisk($array);
            $sortedChangedArray = $this->replacer->getChangedArray();
            ksort($sortedChangedArray);
            $this->painter->setPrefabricatedArray($sortedChangedArray);
            $this->painter->paintToCli();
        };
        $callback2($this->replacer->getArray());
        
       
        // print_r($mergedArrays);
        
        // while (true) {
        //     $callback2($this->replacer->getArray());
        //     $inputFromKeybord = $this->meeter->choosePyramid();
        //     $mergedArrays = $this->replacer->getArray();
        //     ksort($mergedArrays);
        //     // print_r($mergedArrays);
        //     $callback($inputFromKeybord, $mergedArrays);
            
        // }
    }

}
$t = new Bin();
print_r($t->start());
