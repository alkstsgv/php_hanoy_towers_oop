<?php

declare(strict_types=1);
// require '../../vendor/autoload.php';
namespace App;
// use App\BlockBuilder;
// use App\DiskBuilder;

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
        //         $towerWithDisks = new TowerWithDisks();
        // $arr1 = $towerWithDisks->createTowerWithDisks(3);
        // // print_r( $arr1[0]);
        // // print_r(TowerWithoutDisks::createTowerWithoutDisks(1));
        // $towerWithout = new TowerWithoutDisks();
        // $arr2 = $towerWithout->createTowerWithoutDisks(3);
    }
}
