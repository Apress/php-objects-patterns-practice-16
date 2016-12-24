<?php
declare(strict_types=1);

namespace popp\ch05\batch05;

use popp\ch05\batch05\util as u;
use popp\ch05\batch05\util\db\Querier as q;
use popp\ch04\batch02\BookProduct;

class Runner
{

    public static function runbefore()
    {
/* listing 05.21 */
        $classname = "Task";
        require_once("tasks/{$classname}.php");
        $classname = "tasks\\$classname";
        $myObj = new $classname();
        $myObj->doSpeak();
/* /listing 05.21 */
    }

    public static function run()
    {
/* listing 05.22 */
        $base = __DIR__;
        $classname = "Task";
        $path = "{$base}/tasks/{$classname}.php";
        if (! file_exists($path)) {
            throw new \Exception("No such file as {$path}");
        }
        require_once($path);
        $qclassname = "tasks\\$classname";
        if (! class_exists($qclassname)) {
            throw new Exception("No such class as $qclassname");
        }
        $myObj = new $qclassname();
        $myObj->doSpeak();
/* /listing 05.22 */
    }

/* listing 05.24 */
    public static function getProduct()
    {
        return new CdProduct(
            "Exile on Coldharbour Lane",
            "The",
            "Alabama 3",
            10.99,
            60.33
        );
    }
/* /listing 05.24 */

    public static function getBookProduct()
    {
        return new BookProduct(
            "Catch 22",
            "Joseph",
            "Heller",
            11.99,
            300
        );
    }

    public static function run2()
    {

/* listing 05.23 */
        $product = self::getProduct();
        if (get_class($product) === 'popp\ch05\batch05\CdProduct') {
            print "\$product is a CdProduct object\n";
        }
/* /listing 05.23 */

/* listing 05.25 */
        $product = self::getProduct();
        if ($product instanceof \popp\ch05\batch05\CdProduct) {
            print "\$product is an instance of CdProduct\n";
        }
/* /listing 05.25 */
    }

    public static function run3()
    {
        print u\Writer::class."\n";
        print q::class."\n";
        print Local::class."\n";
    }

    public static function run4()
    {
        print_r(get_class_methods('\\popp\\ch04\\batch02\\BookProduct'));
    }

    public static function run5()
    {
/* listing 05.26 */
        $product = self::getProduct();
        $method = "getTitle";   // define a method name
        print $product->$method(); // invoke the method
/* /listing 05.26 */

/* listing 05.27 */
        if (in_array($method, get_class_methods($product))) {
            print $product->$method(); // invoke the method
        }
/* /listing 05.27 */

        if (is_callable(array( $product, $method))) {
            print $product->$method(); // invoke the method
        }

/* listing 05.28 */
        if (method_exists($product, $method)) {
            print $product->$method(); // invoke the method
        }
/* /listing 05.28 */

        print_r(get_class_vars('\\popp\\ch05\\batch05\\CdProduct'));

        print get_parent_class('\\popp\\ch04\\batch02\\BookProduct');

/* listing 05.29 */
        $product = self::getBookProduct(); // acquire an object

        if (is_subclass_of($product, '\\popp\\ch04\\batch02\\ShopProduct')) {
            print "BookProduct is a subclass of ShopProduct\n";
        }
/* /listing 05.29 */


/* listing 05.30 */
        if (in_array('someInterface', class_implements($product))) {
            print "BookProduct is an interface of someInterface\n";
        }
/* /listing 05.30 */

/* listing 05.31 */
        $product = self::getBookProduct(); // Acquire a BookProduct object
        call_user_func([$product, 'setDiscount'], 20);
/* /listing 05.31 */
    }
}
