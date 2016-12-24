<?php
declare(strict_types=1);

namespace popp\ch04\batch08;

/* listing 04.92 */
class Mailer
{
    public function doMail(Product $product)
    {
        print "    mailing ({$product->name})\n";
    }
}
