<?php
declare(strict_types=1);

namespace App;

interface CreateFigureInterface
{
    public function createFigure(int $width, int $height, array $tower): array;
}
