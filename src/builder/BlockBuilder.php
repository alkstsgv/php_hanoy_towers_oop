<?php

declare(strict_types=1);

namespace App;
use App\PropsForBuilder as PFB;

class BlockBuilder extends AbstractFigureBuilder 
{
    public function createFigure(int $width, int $height, array $tower = []): array
    {
     $this->width = $width;
     $this->height = $height;
     $this->tower = $tower;
     
     for ($i = 0; $i <= $height; $i++) {
         
         if ($i == 0) {
             $this->tower[] = PFB::WHITESPACE . str_repeat(PFB::UNDERLINING, $this->width)  . PHP_EOL;
         } elseif ($i == $height) {
             $this->tower[] = PFB::VERT_BAR . str_repeat(PFB::UNDERLINING, $this->width) . PFB::VERT_BAR . PHP_EOL;
         } else {
             $this->tower[] = PFB::VERT_BAR . str_repeat(PFB::WHITESPACE, $this->width) . PFB::VERT_BAR . PHP_EOL;
         }
         
     }
     return $tower;
    }
    
    public function getCreatedFigure() {
     return $this->tower;
 }
}
