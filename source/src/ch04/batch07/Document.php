<?php
declare(strict_types=1);

namespace popp\ch04\batch07;

/* listing 04.54 */
class Document extends DomainObject
{
    public static function getGroup(): string
    {
        return "document";
    }
}
