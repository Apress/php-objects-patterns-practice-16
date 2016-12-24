<?php
declare(strict_types=1);
namespace popp\ch03;

require_once("vendor/autoload.php");

use popp\ch03\batch14\ShopProduct;
use popp\ch03\batch14\BookProduct;
use popp\ch03\batch14\CdProduct;
use popp\ch03\batch14\ShopProductWriter;

class Batch14Test extends \PHPUnit_Framework_TestCase
{
    public function testShopProcuct()
    {

        $test4 = new BookProduct("booktitle", "first", "main", 99, 200);
        self::assertEquals("booktitle ( main, first ): page count - 200", $test4->getSummaryLine());

        $book = new BookProduct("booktitle", "first", "main", 99, 200);
        $book->setDiscount(10);
        self::assertEquals($book->getPrice(), 99);

        $cd = new CdProduct("cdtitle", "first", "main", 99, 200);
        $cd->setDiscount(10);
        self::assertEquals($cd->getPrice(), 89);

        $writer = new ShopProductWriter();
        $writer->addProduct($book);
        $writer->addProduct($cd);

        ob_start();
        $writer->write();
        $out4 = ob_get_contents();
        ob_end_clean();
        self::assertEquals($out4, "booktitle: first main (99)\ncdtitle: first main (89)\n");
    }
}
