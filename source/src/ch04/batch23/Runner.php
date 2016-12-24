<?php
declare(strict_types=1);

namespace popp\ch04\batch23;

class Runner
{
    public static function run()
    {
/* listing 04.90 */
        $logger = create_function(
            '$product',
            'print "    logging ({$product->name})\n";'
        );

        $processor = new ProcessSale();
        $processor->registerCallback($logger);

        $processor->sale(new Product("shoes", 6));
        print "\n";
        $processor->sale(new Product("coffee", 6));
/* /listing 04.90 */
    }

    public static function run2()
    {
/* listing 04.91 */
        $logger2 = function ($product) {
            print "    logging ({$product->name})\n";
        };

        $processor = new ProcessSale();
        $processor->registerCallback($logger2);

        $processor->sale(new Product("shoes", 6));
        print "\n";
        $processor->sale(new Product("coffee", 6));
/* /listing 04.91 */
    }
}
//done
