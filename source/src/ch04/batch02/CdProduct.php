<?php
declare(strict_types=1);

namespace popp\ch04\batch02;

class CdProduct extends ShopProduct
{
    private $playLength = 0;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $playLength
    ) {
        parent::__construct(
            $title,
            $firstName,
            $mainName,
            $price
        );
        $this->playLength = $playLength;
    }

    public function getPlayLength(): int
    {
        return $this->playLength;
    }

    public function getSummaryLine(): string
    {
        $base = parent::getSummaryLine();
        $base .= ": playing time - $this->playLength";
        return $base;
    }
}
