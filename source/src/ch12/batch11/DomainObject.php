<?php
declare(strict_types = 1);

namespace popp\ch12\batch11;

/* listing 12.44 */
abstract class DomainObject
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public static function getCollection(string $type): Collection
    {
        // dummy implementation
        return Collection::getCollection($type);
    }

    public function markDirty()
    {
        // next chapter!
    }
}
