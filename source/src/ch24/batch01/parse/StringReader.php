<?php
declare(strict_types = 1);

namespace popp\ch24\batch01\parse;

/* listing 24.05 */
class StringReader implements Reader
{
    private $in;
    private $pos;

    public function __construct($in)
    {
        $this->in = $in;
        $this->pos = 0;
    }

    public function getChar()
    {
        if ($this->pos >= strlen($this->in)) {
            return false;
        }

        $char = substr($this->in, $this->pos, 1);
        $this->pos++;

        return $char;
    }

    public function getPos(): int
    {
        return $this->pos;
    }

    public function pushBackChar()
    {
        $this->pos--;
    }

    public function string()
    {
        return $this->in;
    }
}
