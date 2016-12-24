<?php
declare(strict_types=1);

namespace popp\ch04\batch06;

class Runner
{
    public static function run()
    {
/* listing 04.51 */
        print_r(Document::create());
/* /listing 04.51 */
    }

    public static function run2()
    {
/* listing 04.11 */
        $p = new ShopProduct("Fine Soap", "", "Bob's Bathroom", 1.33);
        print $p->calculateTax(100) . "\n";
/* /listing 04.11 */
    }

    public static function run3()
    {
        $u = new UtilityService();
        print $u->calculateTax(100) . "\n";
    }
}
