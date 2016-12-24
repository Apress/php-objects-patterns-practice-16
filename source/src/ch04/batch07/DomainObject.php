<?php
declare(strict_types=1);

namespace popp\ch04\batch07;

/* listing 04.52 */
abstract class DomainObject
{
    private $group;

    public function __construct()
    {
        $this->group = static::getGroup();
    }

    public static function create(): DomainObject
    {
        return new static();
    }

    public static function getGroup(): string
    {
        return "default";
    }
}
