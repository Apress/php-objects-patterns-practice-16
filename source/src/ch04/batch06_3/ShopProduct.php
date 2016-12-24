<?php
declare(strict_types=1);

namespace popp\ch04\batch06_3;

/* listing 04.22 */
class ShopProduct implements IdentityObject
{
    use PriceUtilities, IdentityTrait;
}
