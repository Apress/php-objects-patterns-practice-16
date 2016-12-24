<?php
declare(strict_types = 1);

namespace popp\ch24\batch01\parse;

/* listing 24.12 */
class AlternationParse extends CollectionParse
{
    public function trigger(Scanner $scanner): bool
    {
        foreach ($this->parsers as $parser) {
            if ($parser->trigger($scanner)) {
                return true;
            }
        }

        return false;
    }

    protected function doScan(Scanner $scanner): bool
    {
        $type = $scanner->tokenType();

        foreach ($this->parsers as $parser) {
            $start_state = $scanner->getState();
            if ($type == $parser->trigger($scanner) && $parser->scan($scanner)) {
                 return true;
            }
        }

        $scanner->setState($start_state);

        return false;
    }
}
