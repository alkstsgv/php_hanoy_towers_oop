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
        // $mergedArrays = $transformer->mergeTowersToOneArray();
        // $painter = new Painter($transformer->getMergedArrays());
        // $this->painter->__construct($transformer->getMergedArrays());
        // $this->painter->paintToCli();


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
                        // print_r($k);
                        // print_r($mergedArrays[$k]);
                        $this->replacer->setArray($mergedArrays[$k], $k);
                        continue;
                    }
                }
            }

        };

        /**
         * Анонимная функция, которая меняет значения в массивах, и печатает массивы затем
         * @param array $array 
         */
        $callback2 = function (array $array) {
            // $this->meeter->redrawConsolePage();
            // print_r($array);
            $this->replacer->moveDisk($array);
            $sortedChangedArray = $this->replacer->getArray();
            ksort($sortedChangedArray);
            // print_r($sortedChangedArray);
            $this->painter->setPrefabricatedArray($sortedChangedArray);
            $this->painter->paintToCli();
            // print_r($this->replacer->getArray());
        };

        #1
        $inputFromKeybord = $this->meeter->choosePyramid();
        $mergedArrays0 = $transformer->mergeTowersToOneArray();
        $callback($inputFromKeybord, $mergedArrays0);
        $mr = $this->replacer->getArray();
        $callback2( $mr);

        #2
        // $inputFromKeybord = $this->meeter->choosePyramid();
        // $mr = $this->replacer->getArray();
        // // print_r($mr);
        // $callback($inputFromKeybord, $mr);
        // $mr = $this->replacer->getArray();
        // // print_r( $this->replacer->getArray());
        // $callback2($mr);
        // print_r($this->replacer->getArray()); 

        #####2
        // print_r($this->replacer->getArray());
        // $inputFromKeybord = $this->meeter->choosePyramid();
        // $mergedArrays2 = $this->replacer->getArray();
        // $mergedArrays2 = ksort($mergedArrays2);
        // $callback($inputFromKeybord, $mergedArrays2);
        // $callback2( $mergedArrays2);
        // print_r($this->replacer->getArray());
       

        
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
