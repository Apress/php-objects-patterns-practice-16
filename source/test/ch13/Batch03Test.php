<?php
declare(strict_types=1);

namespace popp\ch13\batch03;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch03Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;

        $val = $this->capture(function() { Runner::run2(); });
        print $val;
        
/*        
        $val = $this->capture(function() { Runner::run3(); });
        print $val;

        $val = $this->capture(function() { Runner::run4(); });
        //print $val;

        $val = $this->capture(function() { Runner::run5(); });
        print $val;
*/
    }

    /*
    public function testObjectWatcher()
    {
        $config = __DIR__."/../batch01/data/woo_options.ini";
        $options = parse_ini_file($config, true);
        Registry::reset();
        $reg = Registry::instance();
        $conf = new Conf($options['config']);
        $reg->setConf($conf);
        $reg = Registry::instance();
        $dsn = $reg->getDSN();
        if (is_null($dsn)) {
            throw new AppException("No DSN");
        }
        $pdo = new \PDO($dsn);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $autoincrement = "AUTOINCREMENT";

        $pdo->query("DROP TABLE IF EXISTS venue");
        $pdo->query("CREATE TABLE venue ( id INTEGER PRIMARY KEY 
                $autoincrement, name TEXT )");
        $pdo->query("INSERT into venue ( name ) values ('bob')");
        $pdo->query("DROP TABLE  IF EXISTS space");
        $pdo->query("CREATE TABLE space ( id INTEGER PRIMARY KEY 
                $autoincrement, venue INTEGER, name TEXT )");
        $pdo->query("DROP TABLE IF EXISTS event");
        $pdo->query("CREATE TABLE event ( id INTEGER PRIMARY KEY 
                $autoincrement, space INTEGER, start long, duration int, name text )");
    }
    */
}
