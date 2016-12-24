<?php
declare(strict_types = 1);

namespace popp\ch12\batch05;

class Conf
{
    private $vals = [];

    public function __construct(array $vals = [])
    {
        $this->vals = $vals;
    }

    public function get(string $key)
    {
        if (isset($this->vals[$key])) {
            return $this->vals[$key];
        }

        return null;
    }

    public function set(string $key, $val)
    {
        $this->vals[$key] = $val;
    }
}
