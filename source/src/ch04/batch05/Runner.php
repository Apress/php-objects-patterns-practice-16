<?php
declare(strict_types=1);

namespace popp\ch04\batch05;

class Runner
{
    public static function run()
    {
        $product = new ShopProduct();
    }

    public static function run2()
    {
        $consultancy = new Consultancy();
    }

    public static function run3()
    {
        $document = Document::create();
        print_r($document);
    }
}
