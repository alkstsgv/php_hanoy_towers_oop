<?php
declare(strict_types=1);
namespace App;
use App\TowerWithDisks;
use App\TowerWithoutDisks;
require '../../vendor/autoload.php';


class Replacer
{
    private $arr1;
    private $arr2;
    public $middleArr;
    public $finalArr;
    
    public function __construct(array $arr1, array $arr2)
    {
        $this->arr1 = $arr1;
        $this->arr2 = $arr2;
    }
    public function getMiddleArr(): array
    {
        return $this->middleArr;
    }
    public function getArr1(): array 
    {
        return $this->arr1;
    }

    public function getArr2(): array 
    {
        return $this->arr2;
    }

    public function getFinalArr()
    {
        return $this->moveDisk();
    }


    // private function moveDisk()
    // {      
    //     print_r(count($this->arr1)) . PHP_EOL;
    //     print_r(count($this->arr2)) . PHP_EOL;
    //     $counter = count($this->arr1) - count($this->arr2) . PHP_EOL;
    //     print_r($counter) . PHP_EOL;
    //     for ($i = $counter; $i >= 0; $i--) {
    //         // print_r($this->arr1[count($this->arr1)-1]);

    //         if (($this->arr1[count($this->arr2)-1]) !== ($this->arr2[count($this->arr2)-1])) {
    //             // print_r($this->arr1[count($this->arr1)-1]);
    //             // print_r($this->arr2[count($this->arr2)-1]);
    //             // print_r("SAME!!!");
    //             continue;
    //         } else {
    //             // print_r($this->arr1[count($this->arr1)-1]);
    //             // print_r($this->arr2[count($this->arr2)-1]);

    //             $this->middleArr[] = array_pop($this->arr1);
    //             // var_dump($this->middleArr);
    //             $this->arr2[] = array_pop($this->middleArr);
                

    //             break;
    //         }
    //     }
    // }

    private function moveDisk()
    {      
        // $revArr1 = array_reverse($this->arr1, true);
        // $revArr2 = array_reverse($this->arr2, true);

        // foreach ($revArr1 as $k => $v) {
        //     $this->middleArr[] = $v;
        //     if (end($this->middleArr) === end($revArr2)) {
        //         $this->middleArr[] = array_pop($revArr2);
        //         // var_dump($this->middleArr);
        //         continue;
        //     } else {
        //         $revArr2[] = end($this->middleArr);
        //     }
        // }

        foreach ($this->arr1 as $k => $v){
            
            if (end($this->arr1) === end($this->arr2)) {
                $this->middleArr[] = array_pop($this->arr1);
                $this->middleArr[] = array_pop($this->arr2);
                // var_dump($this->middleArr);
                continue;
            }
           else {
                 
                // print_r( count($this->middleArr));

                // $this->arr2[] = array_pop($this->middleArr);
                $this->middleArr[] = array_pop($this->arr1);
               
                // $this->arr2[] = array_pop($this->middleArr);
                for ($i = 0; $i <= count($this->middleArr); $i++) {
                    
                    // $this->middleArr[] = array_pop($this->arr1);
                    
                    $this->arr2[] = array_pop($this->middleArr);
                    $this->arr1[] = array_pop($this->middleArr);
                    
                }
                break;
            }
        }
    }
}

$towerWithDisks = new TowerWithDisks();
// var_dump($towerWithDisks->createTowerWithDisks(7));2
$arr1 = $towerWithDisks->createTowerWithDisks(3);

$towerWithout = new TowerWithoutDisks();
$arr2 = $towerWithout->createTowerWithoutDisks(3);

$towerWithout1 = new TowerWithoutDisks();
$arr3 = $towerWithout1->createTowerWithoutDisks(3);
// var_dump($arr1);

// var_dump($arr2);
// print_r($arr1);

$replacer = new Replacer($arr1, $arr2);
// print_r($replacer->getArr1());
// print_r($replacer->getArr2());
// print_r($replacer->getMiddleArr());
$replacer->getFinalArr();
// print_r($replacer->getArr1());
// print_r($replacer->getArr2());
$replacer = new Replacer($replacer->getArr2(), $replacer->getArr1());
$replacer->getFinalArr();
print_r($replacer->getArr2());
$replacer1 = new Replacer($replacer->getArr2(), $arr3);
// print_r($replacer1->getArr1());
// print_r($replacer1->getArr2());
$replacer1->getFinalArr();
// print_r($replacer1->getArr2());
// print_r($replacer1->getArr1());
// print_r($replacer1->getArr2());
// print_r($replacer1->getMiddleArr());

$replacer2 = new Replacer($replacer1->getArr2(), $replacer->getArr1());
// print_r($replacer2->getArr1());
// print_r($replacer2->getArr2());

// print_r($replacer2->getArr1());
// print_r($replacer2->getArr2());

$replacer2->getFinalArr();
// print_r($replacer2->getArr1());
// print_r($replacer2->getArr2());
// print_r($replacer->getMiddleArr());



// $a1 = [[1], [2], [3], [4]];
// print_r(count($a1));
// print_r(count($a1) - 1);
// $counter = count($a1) - 1;
// print_r($a1[4]);
// $a2 = [[11], [22], [3], [44]];

// if ((end($a1) - 1) === (end($a2) - 1)) {
//     print_r("y2");
// }
// $a1 = array_reverse($a1, true);
// $a2 = array_reverse($a2, true);
// $a1 = array_pop($a2);
// // $a2 = array_pop()
// print_r($a1);


