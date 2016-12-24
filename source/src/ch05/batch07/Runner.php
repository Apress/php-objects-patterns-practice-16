<?php
declare(strict_types=1);

namespace popp\ch05\batch07;

use popp\ch04\batch02\BookProduct;
use popp\ch04\batch02\CdProduct;

class Runner
{
    public static function run()
    {
        $d = new Delegator();
        $d->andAnotherThing("a", "b");
    }
    public static function run2()
    {
/* listing 05.34 */
        $prodclass = new \ReflectionClass('popp\\ch04\\batch02\\CdProduct');
        \Reflection::export($prodclass);
/* /listing 05.34 */
    }

    public static function run3()
    {
/* listing 05.35 */
        $cd = new CdProduct("cd1", "bob", "bobbleson", 4, 50);
        var_dump($cd);
/* /listing 05.35 */
    }

    public static function run4()
    {
/* listing 05.37 */
        $prodclass = new \ReflectionClass('popp\\ch04\\batch02\\CdProduct');
        print ClassInfo::getData($prodclass);
/* /listing 05.37 */
    }

    public static function run5()
    {
/* listing 05.39 */
        print ReflectionUtil::getClassSource(
            new \ReflectionClass('popp\\ch04\\batch02\\CdProduct')
        );
/* /listing 05.39 */

        print ReflectionUtil::getClassSource(
            new \ReflectionClass('\popp\ch05\batch07\Runner')
        );
    }

    public static function run6()
    {
/* listing 05.40 */
        $prodclass = new \ReflectionClass('popp\\ch04\\batch02\\CdProduct');
        $methods = $prodclass->getMethods();

        foreach ($methods as $method) {
            print ClassInfo::methodData($method);
            print "\n----\n";
        }
/* /listing 05.40 */
    }

    public static function run7()
    {
/* listing 05.43 */
        $class = new \ReflectionClass('popp\\ch04\\batch02\\CdProduct');
        $method = $class->getMethod('getSummaryLine');
        print ReflectionUtil::getMethodSource($method);
/* /listing 05.43 */
    }

    public static function run8()
    {
/* listing 05.44 */
        $class = new \ReflectionClass('popp\\ch04\\batch02\\CdProduct');

        $method = $class->getMethod("__construct");
        $params = $method->getParameters();

        foreach ($params as $param) {
            print ClassInfo::argData($param) . "\n";
        }
/* /listing 05.44 */
    }
}
