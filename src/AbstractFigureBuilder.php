<?php
declare(strict_types=1);
namespace App;
require_once('Props.php');

abstract class AbstractFigureBuilder
{
    public $width;
    public $height;

    public function createFigure(int $width, int $height): array
    {
        $this->width = $width;
        $this->height = $height;
        $tower = [];
        
        for ($i = 0; $i <= $height; $i++) {
            
            if ($i == 0) {
                $tower[] = WHITESPACE . str_repeat(UNDERLINING, $this->width)  . PHP_EOL;
            } elseif ($i == $height) {
                $tower[] = VERT_BAR . str_repeat(UNDERLINING, $this->width) . VERT_BAR . PHP_EOL;
            } else {
                $tower[] = VERT_BAR . str_repeat(WHITESPACE, $this->width) . VERT_BAR . PHP_EOL;
            }
            
        }
        return $tower;
    }
}
