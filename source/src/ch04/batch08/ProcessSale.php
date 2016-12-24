<?php
declare(strict_types=1);

namespace popp\ch04\batch08;

class ProcessSale
{
    private $callbacks;

    public function registerCallback($callback)
    {
        if (! is_callable($callback)) {
            throw new Exception("callback not callable");
        }
        $this->callbacks[] = $callback;
    }

    public function sale($product)
    {
        print "{$product->name}: processing \n";
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }
}
