<?php
declare(strict_types=1);
namespace App;

abstract class AbstractFigureBuilder
{
    public $width;
    public $height;
    protected $tower = [];


    public function createFigure(int $width, int $height, array $tower = []): array
    {
        $this->width = $width;
        $this->height = $height;
        $this->tower[] = $tower;
        
        for ($i = 0; $i <= $height; $i++) {
            
            if ($i == 0) {
                $this->tower[] = PropsForPainter::WHITESPACE . str_repeat(PropsForPainter::UNDERLINING, $this->width)  . PHP_EOL;
            } elseif ($i == $height) {
                $this->tower[] = PropsForPainter::VERT_BAR . str_repeat(PropsForPainter::UNDERLINING, $this->width) . PropsForPainter::VERT_BAR . PHP_EOL;
            } else {
                $this->tower[] = PropsForPainter::VERT_BAR . str_repeat(PropsForPainter::WHITESPACE, $this->width) . PropsForPainter::VERT_BAR . PHP_EOL;
            }
            
        }
        return $tower;
    }
   

    public function getTower() {
        return $this->tower;
    }
}
