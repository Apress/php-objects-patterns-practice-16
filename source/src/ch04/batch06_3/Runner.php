<?php
declare(strict_types=1);

namespace popp\ch04\batch06_3;

class Runner
{
    public static function run()
    {
/* listing 04.24 */
        $p = new ShopProduct();
        self::storeIdentityObject($p);
        print $p->calculateTax(100) . "\n";
        print $p->generateId() . "\n";
/* /listing 04.24 */
    }

    public static function run2()
    {
/* listing 04.28 */
        // deliberate error averted!
        //$u = new UtilityService();
        //print $u->calculateTax(100) . "\n";
/* /listing 04.28 */
    }


/* listing 04.23 */
    public static function storeIdentityObject(IdentityObject $idobj)
    {
        // do something with the IdentityObject
    }
/* /listing 04.23 */
}
