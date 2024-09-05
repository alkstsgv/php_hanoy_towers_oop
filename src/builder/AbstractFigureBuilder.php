<?php
declare(strict_types=1);
namespace App;


abstract class AbstractFigureBuilder
{
    public $width;
    public $height;
    protected $tower = [];

    abstract public function createFigure(int $width, int $height, array $tower = []): array;
    abstract public function getCreatedFigure();
}
