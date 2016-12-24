<?php
declare(strict_types=1);

namespace popp\ch04\batch09;

class Runner
{
    public static function run()
    {
        $conf = new Conf(__DIR__."/conf01.xml");
        print "user: ".$conf->get('user')."\n";
        print "host: ".$conf->get('host')."\n";
        $conf->set("pass", "newpass2");
        $conf->write();
    }
}
