<?php
declare(strict_types=1);

namespace popp\ch04\batch06_6;

class Runner
{
    public static function run()
    {
/* listing 04.35 */
        $u = new UtilityService();
        print $u::calculateTax(100) . "\n";
/* /listing 04.35 */
    }
}
