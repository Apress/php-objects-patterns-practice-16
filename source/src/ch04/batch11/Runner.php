<?php
declare(strict_types=1);

namespace popp\ch04\batch11;

class Runner
{
    public static function run()
    {
        self::init();
    }

    public static function run2()
    {
        self::init2();
    }

/* listing 04.66 */
    public static function init()
    {
        try {
            $fh = fopen(__DIR__ . "/log.txt", "a");
            fputs($fh, "start\n");
            $conf = new Conf(dirname(__FILE__) . "/conf.broken.xml");
            print "user: " . $conf->get('user') . "\n";
            print "host: " . $conf->get('host') . "\n";
            $conf->set("pass", "newpass");
            $conf->write();
            fputs($fh, "end\n");
            fclose($fh);
        } catch (FileException $e) {
            // permissions issue or non-existent file
            fputs($fh, "file exception\n");
            throw $e;
        } catch (XmlException $e) {
            fputs($fh, "xml exception\n");
            // broken xml
        } catch (ConfException $e) {
            fputs($fh, "conf exception\n");
            // wrong kind of XML file
        } catch (\Exception $e) {
            fputs($fh, "general exception\n");
            // backstop: should not be called
        }
    }
/* /listing 04.66 */

    public static function init2()
    {
        $fh = fopen(__DIR__ . "/log.txt", "w");
        try {
            fputs($fh, "start\n");
            $conf = new Conf(dirname(__FILE__) . "/conf.not-there.xml");
            print "user: " . $conf->get('user') . "\n";
            print "host: " . $conf->get('host') . "\n";
            $conf->set("pass", "newpass");
            $conf->write();
        } catch (FileException $e) {
            // permissions issue or non-existent file
            fputs($fh, "file exception\n");
            //throw $e;
        } catch (XmlException $e) {
            fputs($fh, "xml exception\n");
            // broken xml
        } catch (ConfException $e) {
            fputs($fh, "conf exception\n");
            // wrong kind of XML file
        } catch (Exception $e) {
            fputs($fh, "general exception\n");
            // backstop: should not be called
        } finally {
            fputs($fh, "end\n");
            fclose($fh);
        }
    }

    public static function init3()
    {
        try {
            eval("illegal code");
        } catch (\Error $e) {
            print get_class($e) . "\n";
        } catch (\Exception $e) {
            // do something with an Exception
        }
    }
}
