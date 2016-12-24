<?php
declare(strict_types = 1);

namespace popp\ch12\batch11;

class Space extends DomainObject
{
    private $name;
    private $venue;

    public function __construct(int $id, string $name)
    {
        $this->name = $name;
        parent::__construct($id);
    }

    public function setVenue(Venue $venue)
    {
        $this->venue = $venue;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        $this->markDirty();
    }

    public function getName(): string
    {
        return $this->name;
    }
}
