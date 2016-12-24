<?php
declare(strict_types = 1);

namespace popp\ch24\batch01\parse;

/* listing 24.09 */
abstract class CollectionParse extends Parser
{
    protected $parsers = [];

    public function add(Parser $p): Parser
    {
        if (is_null($p)) {
            throw new Exception("argument is null");
        }

        $this->parsers[] = $p;

        return $p;
    }

    public function term(): bool
    {
        return false;
    }
}
