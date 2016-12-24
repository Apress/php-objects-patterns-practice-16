<?php
declare(strict_types=1);

namespace popp\ch04\batch04;

class ErroredWriter extends ShopProductWriter
{
    // perversely added this to prevent error
    // even though the class is here to demonstrate
    // the error of not implementing the method
    public function write()
    {
    }
}
