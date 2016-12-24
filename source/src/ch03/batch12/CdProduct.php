<?php
declare(strict_types=1);
namespace popp\ch03\batch12;

/* listing 03.36 */
class CdProduct extends ShopProduct
{
    public function getPlayLength()
    {
        return $this->playLength;
    }

    public function getSummaryLine()
    {
        $base  = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        $base .= ": playing time - {$this->playLength}";
        return $base;
    }
}
/* /listing 03.36 */
