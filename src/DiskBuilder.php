<?php
declare(strict_types=1);

namespace App;
// require_once('Props.php');


// interface DiskInterface
// {
//     public function createDisk(int $width, int $height);
// }

// class DiskBuilder implements DiskInterface
// {
//     public $width;
//     public $height;

//     public function createDisk(int $width, int $height)
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


class DiskBuilder extends AbstractFigureBuilder 
{

}
