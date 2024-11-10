<?php
declare(strict_types=1);

namespace App;

final class Meeter
{
    public $prompt = "";
    public function __construct(
        string $prompt = null,
        array $choose = null
    ) {
        $this->prompt = $prompt;
    }

    public function showMeetingMessage(): void
    {
        echo <<<EOL
    \ec \e[31m
    Здравствуйте! Пожалуйста, введите своё имя: \n
    EOL;

        $this->prompt = readline();

        echo <<<EOL
    \e[32m
    Здравствуйте,\e[31m $this->prompt! \e[32m 
    Вы запустили игру 'Ханойские башни'. \n 
    Правила игры: 
    1. Переместить все диски с пирамиды с дисками на пирамиду без дисков за как можно меньшее кол-во действий. \n
    Условия игры:
    1. Диски большего диаметра не могу лежать на дисках меньшего диаметра.
    2. Диски меньшего диаметра могут лежать на дисках большего диаметра.
    \e[36m
    Возможности игрока:
    1. Вы можете указать кол-во дисков пирамиды от 0 до бесконечности.
    2. Вы можете перемещать диски с помощью ввода номера башни с клавиатуры, используя цифры \e[31m 1, 2, 3.
    \e[32m
    EOL;
    }

    public function choosePyramid(int $chooseMode = null): array
    {
        if ($chooseMode === 0) {
            return $choose = [0, 1, 2];
        } else {
            $haystack = [1, 2, 3];
            $choose = [
                trim(readline("Выберите первую пирамиду: ")) . PHP_EOL,
                trim(readline("Выберите вторую пирамиду: ")) . PHP_EOL
            ];

            if (max($choose) != max($haystack)) {
                array_push($choose, max($haystack));
            } elseif (max($choose) == max($haystack)) {
                array_push($choose, max($choose) - min($choose));
            }

            foreach ($choose as $key => $value) {
                if ($choose[0] === $choose[1]) {
                    return (new Meeter())->choosePyramid();
                }
                if ($value <= 0 || $value > 3 || is_string($value)) {
                    $choose[$key] = 0;
                }
                if (in_array((int)$value, $haystack, $strict = true)) {
                    $choose[$key] = (int)$value - 1;
                }
            }
            return $choose;
        }
    }

    public function redrawConsolePage(): void
    {
        print_r("\ec");
        print_r("\e[10B");
        print_r("\e[38;5;128m");
    }
}
