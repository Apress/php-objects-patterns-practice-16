<?php

namespace popp\test;

require_once("vendor/autoload.php");

class BaseUnit extends \PHPUnit_Framework_TestCase
{

    function capture(callable $callme)
    {
        ob_start();
        $callme();
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
