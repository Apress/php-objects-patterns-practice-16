<?php

namespace popp\ch03;

require_once("vendor/autoload.php");

use popp\ch03\batch11\ShopProduct;
use popp\ch03\batch11\BookProduct;
use popp\ch03\batch11\CdProduct;
use popp\ch03\batch11\ShopProductWriter;

class Batch11Test extends \PHPUnit_Framework_TestCase
{
    public function testShopProcuct()
    {
        $test1 = new ShopProduct("booktitle", "first", "main", 99, 200);

        self::assertEquals("first main", $test1->getProducer());
        self::assertEquals(200, $test1->getNumberOfPages());
        self::assertEquals("booktitle ( main, first ): page count - 200", $test1->getSummaryLine());

        $test2 = new ShopProduct("cdtitle", "first", "main", 99, 0, 88);
        $test2->setType("cd");
        self::assertEquals("first main", $test2->getProducer());
        self::assertEquals(88, $test2->getPlayLength());
        self::assertEquals("cdtitle ( main, first ): playing time - 88", $test2->getSummaryLine());

        $test3 = new CdProduct("cdtitle", "first", "main", 99, 88);
        self::assertEquals("cdtitle ( main, first ): playing time - 88", $test3->getSummaryLine());

        $test4 = new BookProduct("booktitle", "first", "main", 99, 200);
        self::assertEquals("booktitle ( main, first ): page count - 200", $test4->getSummaryLine());

        $writer = new ShopProductWriter();

        ob_start();
        $writer->write($test3);
        $out3 = ob_get_contents();
        ob_end_clean();
        self::assertEquals("cdtitle: first main (99)\n", $out3);

        ob_start();
        $writer->write($test4);
        $out4 = ob_get_contents();
        ob_end_clean();
 
        self::assertEquals("booktitle: first main (99)\n", $out4);
    }
}
