<?php

declare(strict_types=1);

namespace App;

require_once('Props.php');

// interface TowerInterface
// {
//     public function createTower(int $width, int $height);
// }


// class TowerBuilder implements TowerInterface
// {
//     public $width;
//     public $height;

//     public function createTower(int $width, int $height)
//     {
//         $this->width = $width;
//         $this->height = $height;

//         for ($i = 0; $i <= $height; $i++) {
            
//             if ($i == 0) {
//                 echo WHITESPACE . str_repeat(UNDERLINING, $this->width)  . PHP_EOL;
//             } elseif ($i == $height) {
//                 echo VERT_BAR . str_repeat(UNDERLINING, $this->width) . VERT_BAR . PHP_EOL;
//             } else {
//                 echo VERT_BAR . str_repeat(WHITESPACE, $this->width) . VERT_BAR . PHP_EOL;
//             }
            
//         }
//     }
// }
// $tower = new TowerBuilder();
// $tower->createTower(10, 5);

class TowerBuilder extends AbstractFigureBuilder 
{

}
