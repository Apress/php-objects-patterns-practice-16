<?php

namespace popp\ch06\batch03;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;


class Batch03Test extends BaseUnit 
{

    public function testRunner()
    {
        $paramsfile = __DIR__."/../../src/ch06/batch03/params.xml";
        if ( file_exists($paramsfile)) {
            unlink($paramsfile);
        }

        $val = $this->capture(function() { Runner::run(); });
        self::assertTrue(file_exists($paramsfile));
        $txt = file_get_contents($paramsfile);
        print $val;

        self::assertRegexp("|<key>key1</key>|", $txt);
        self::assertRegexp("|<key>key2</key>|", $txt);
        self::assertRegexp("|<key>key3</key>|", $txt);


        self::assertRegexp("|<val>val1</val>|", $txt);
        self::assertRegexp("|<val>val2</val>|", $txt);
        self::assertRegexp("|<val>val3</val>|", $txt);

        $val = $this->capture(function() { Runner::run2(); });
        //print $val;

        self::assertRegexp("/key1/", $val);
        self::assertRegexp("/val1/", $val);

        self::assertRegexp("/key2/", $val);
        self::assertRegexp("/val2/", $val);

        self::assertRegexp("/key3/", $val);
        self::assertRegexp("/val3/", $val);
 
        $val = $this->capture(function() { Runner::run3(); });
        $paramsfile = __DIR__."/../../src/ch06/batch03/newparams.txt";
        $txt = file_get_contents($paramsfile);
        $contents = "key1:val1\nkey2:val2\nkey3:val3\nnewkey1:newval1\n";
        self::assertEquals($txt, $contents);
    }
}

