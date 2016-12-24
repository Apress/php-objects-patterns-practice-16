<?php
declare(strict_types=1);

namespace popp\ch04\batch02;

class Runner
{
    public static function run()
    {
        // runner code here

        $dbgen = new DbGenerate();
        $pdo = $dbgen->getPDO();

        $obj = ShopProduct::getInstance(1, $pdo);
        print_r($obj);
        $obj = ShopProduct::getInstance(2, $pdo);
        print_r($obj);
        $obj = ShopProduct::getInstance(3, $pdo);
        print_r($obj);
    }
}
