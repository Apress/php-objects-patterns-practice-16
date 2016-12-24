<?php
declare(strict_types = 1);

namespace popp\ch24\batch01\parse;

/* listing 24.11 */
class RepetitionParse extends CollectionParse
{
    private $min;
    private $max;

    public function __construct($min = 0, $max = 0, $name = null, $options = null)
    {
        parent::__construct($name, $options);

        if ($max < $min && $max > 0) {
            throw new Exception(
                "maximum ( $max ) larger than minimum ( $min )"
            );
        }

        $this->min = $min;
        $this->max = $max;
    }

    public function trigger(Scanner $scanner): bool
    {
        return true;
    }

    protected function doScan(Scanner $scanner): bool
    {
        $start_state = $scanner->getState();

        if (empty($this->parsers)) {
            return true;
        }

        $parser = $this->parsers[0];
        $count = 0;

        while (true) {
            if ($this->max > 0 && $count >= $this->max) {
                return true;
            }

            if (! $parser->trigger($scanner)) {
                if ($this->min == 0 || $count >= $this->min) {
                    return true;
                } else {
                    $scanner->setState($start_state);

                    return false;
                }
            }

            if (! $parser->scan($scanner)) {
                if ($this->min == 0 || $count >= $this->min) {
                    return true;
                } else {
                    $scanner->setState($start_state);

                    return false;
                }
            }

            $count++;
        }

        return true;
    }
}
