<?php
declare(strict_types=1);

/* listing 05.11 */
namespace popp\ch05\batch04;

/* /listing 05.11 */

use popp\ch05\batch04\util\InSame;
use popp\ch05\batch04\client\FromClient;
use popp\ch05\batch04\util as util;
use popp\ch05\batch04\util\Debug;
use popp\ch05\batch04\util\Lister;

// need to include this non-namespace
require_once(__DIR__."/Lister.php");

// cause name clash
//use popp\ch05\batch04\Debug;

// cure name clash with alias
use popp\ch05\batch04\Debug as coreDebug;

class Runner
{
    public static function runbefore()
    {
        \popp\ch05\batch04\Debug::helloworld();
    }


    public static function run()
    {
        InSame::run();
    }

    public static function run2()
    {
        FromClient::run();
    }

    public static function run3()
    {
        util\Debug::helloWorld();
    }

    public static function run4()
    {

        Debug::helloWorld();
    }

    public static function run5()
    {
        coreDebug::helloWorld();
    }

    public static function run6()
    {
        coreDebug::helloWorld();
    }

    public static function run7()
    {
/* listing 05.11 */
        Lister::helloWorld();  // access local
        \Lister::helloWorld(); // access global
/* /listing 05.11 */
    }

    public static function run8()
    {
        require_once(__DIR__."/Autoload.php");
    }

    public static function run9()
    {
        require_once(__DIR__."/Autoload2.php");
    }

    public static function run10()
    {
        require_once(__DIR__."/Autoload3.php");
    }

    public static function run11()
    {
        require_once(__DIR__."/Autoload4.php");
    }
}
