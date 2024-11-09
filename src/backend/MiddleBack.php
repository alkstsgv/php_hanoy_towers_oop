<?php

declare(strict_types=1);

namespace App;

// use App\DiskBuilder;
// use App\Meeter;
// use App\Painter;
// use App\Replacer;
// use App\TowerBuilder;
// use App\Transformer;

// use Dotenv\Parser\Value;

require '../../vendor/autoload.php';

final class MiddleBack
{
    private $towerLevel;
    private $meeter;
    private $towerBuilder;
    private $replacer;
    private $painter;
    private $disk;
    private $diskBack;
    private $data;
    private $middleFront;

    public function __construct(
        int $towerLevel = null,
        $meeter = null,
        $towerBuilder = null,
        $replacer = null,
        $painter = null,
        $disk = null,
        $diskBack = null,
        $data = null,
        $middleFront = null
    ) {
        $this->towerLevel = $towerLevel ?? null;
        $this->meeter = new Meeter();
        $this->towerBuilder = new TowerBuilder();
        $this->replacer = new Replacer();
        $this->painter = new Painter();
        $this->disk = new DiskBuilder();
        $this->diskBack = new Disk();
        $this->data = $data;
        $this->middleFront = new MiddleFront() ?? null;
    }
    public function start(): void
    {
        /**
         * Анонимная функция нужна для матча введённых цифр с клавиатуры с конкретным Tower
         * @param array $inputFromKeybord Введённые с клавиатуры цифры
         * @param array $mergedArrays Полученные массивы, по которым будет идти матчинг
         */
        $matchTowers = function (array $inputFromKeybord, array $mergedArrays): void {
            foreach ($inputFromKeybord as $keybordKey => $keybordValue) {
                foreach ($mergedArrays as $mergedKey => $mergedValue) {
                    if ($mergedKey === $keybordValue) {
                        $this->towerBuilder->setTowersWithInputKeyboard($mergedArrays[$mergedKey], $mergedKey);
                        continue;
                    }
                }
            }
        };

        /**
         * Анонимная функция для выполнения повторных действий смены дисков
         * @param array $movedDisks это полученные перемещённые диски
         * @param array $inputFromKeybord Введённые с клавиатуры цифры
         * @return array $movedDisks массив с дисками
         */
        $repeatChangeDisks = function (array $movedDisks, $inputFromKeybord): array {
            $matchedTowersFromKeyboard = $this->towerBuilder->getTowersWithInputKeyboard();
            ksort($matchedTowersFromKeyboard);
            $this->towerBuilder->setFinalArray($matchedTowersFromKeyboard);
            $movedDisks = $this->replacer->trullyMoveDisk($movedDisks, (int)$inputFromKeybord[0], (int)$inputFromKeybord[1]);
            return $movedDisks;
        };

        // action №1
        $this->meeter->showMeetingMessage();
        $this->towerLevel = (int)readline("Введите желаемую высоту пирамиды: ");
        $this->towerBuilder->createTowers();
        $mergedArrays = $this->towerBuilder->getCreatedTowers();
        $inputFromKeybord = $this->meeter->choosePyramid(0);
        $matchTowers($inputFromKeybord, $mergedArrays);
        $matchedTowersFromKeyboard = $this->towerBuilder->getTowersWithInputKeyboard();
        $arrayWithDisks = $this->diskBack->initiateDisks($matchedTowersFromKeyboard, $this->towerLevel, 0);
        ksort($arrayWithDisks);
        self::setTowerBuilderData(json_encode($arrayWithDisks));
        $this->towerBuilder->setFinalArray($arrayWithDisks);
        $movedDisks = $this->replacer->trullyMoveDisk($arrayWithDisks, (int)$inputFromKeybord[0], (int)$inputFromKeybord[1]);

        // action №2
        while (true) {
            $inputFromKeybord = $this->meeter->choosePyramid();
            $movedDisks = $repeatChangeDisks($movedDisks, $inputFromKeybord);
            $this->meeter->redrawConsolePage();
            self::setTowerBuilderData(json_encode($movedDisks));
            $matchTowers($inputFromKeybord, $movedDisks);
        }
    }
    /**
     * Функция нужна для того, чтобы засетить то, что есть на беке
     * @param string $data принимает array в виде json_encode
     * @return void
     */
    public function setTowerBuilderData(string $data): void
    {
        $this->data = $data;
        $this->notifyObservers($this->getTowerBuilderData());
    }
    /**
     * Функция нужна для получения данных с бека
     * @return string возвращает array в виде json_encode
     */
    public function getTowerBuilderData(): string
    {
        return json_encode($this->data);
    }

    public function notifyObservers(string $string)
    {
        $this->middleFront->setTowerLevel($this->towerLevel);
        $this->middleFront->notifyPainter($string);
    }

}