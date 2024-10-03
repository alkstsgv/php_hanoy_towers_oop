<?php

declare(strict_types=1);
// require '../../vendor/autoload.php';

namespace App;

//TODO переосмыслить класс, его название, то, что он должен выполнять. Возможно, этого класса не должно быть
class SupportivePainter
{
    public function choosePyramid(): array
    {
        $choose = [
            $firstPyr = trim(readline("Выберите первую пирамиду: ")) . PHP_EOL,
            $secondPyr = trim(readline("Выберите вторую пирамиду: ")) . PHP_EOL
        ];
        return $choose;
    }

    public function redrawConsolePage(): void
    {
        print_r("\ec");
        print_r("\e[10B");
        print_r("\e[38;5;128m");
    }
    public function redrawAndPrintInConsole(array $array): void
    {
        self::redrawConsolePage(); // перериосвка страницы в консоли
        //TODO Вызывать функцию печати

    }
}
