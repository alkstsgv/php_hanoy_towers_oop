<?php
declare(strict_types=1);

namespace App;

class MiddleFront
{
    private $towerLevel;
    private $painter;
    private $arraysToDraw;
    public function __construct(
        int $towerLevel = null,
        $painter = null,
        array $arraysToDraw = null
    ) {
        $this->towerLevel = $towerLevel ?? 1;
        $this->painter = new Painter();
        $this->$arraysToDraw = [];
    }

    public function setTowerLevel(int $towerLevel)
    {
        $this->towerLevel = $towerLevel;
    }
    public function countElementsToDraw(string $string): array
    {
        $arraysFromBack = json_decode(json_decode($string, true), true);
        foreach ($arraysFromBack as $key => $array) {
            if (count($array) === 0) {
                $this->arraysToDraw[$key] = (new TowerBuilder($this->towerLevel))->
                createTowerWithOrWithoutDisks(count($array), $this->towerLevel);
            } elseif (count($array) > 0) {
                $this->arraysToDraw[$key] = (new TowerBuilder($this->towerLevel))->
                createTowerWithOrWithoutDisks(count($array), $this->towerLevel);
            }
        }
        return $this->arraysToDraw;
    }

    public function createFiguresToDraw(): void
    {
        $this->painter->setPrefabricatedArray(json_encode($this->arraysToDraw));
        $this->painter->paintToCli();
    }

    public function notifyPainter(string $inputString): void
    {
        self::countElementsToDraw($inputString);
        self::createFiguresToDraw();
    }
}
