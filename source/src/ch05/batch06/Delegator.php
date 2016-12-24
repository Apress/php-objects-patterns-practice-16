<?php
declare(strict_types=1);

namespace popp\ch05\batch06;

class Delegator
{
    private $thirdpartyShop;
    public function __construct()
    {
        $this->thirdpartyShop = new OtherShop();
    }

/* listing 05.32 */
    public function __call($method, $args)
    {
        if (method_exists($this->thirdpartyShop, $method)) {
            return $this->thirdpartyShop->$method();
        }
    }
/* /listing 05.32 */
}
