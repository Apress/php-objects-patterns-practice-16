<?php
declare(strict_types = 1);

namespace popp\ch13\batch01;

class Space extends DomainObject
{
    private $name;
    private $venue = null;

    public function __construct(int $id, string $name, Venue $venue = null)
    {
        $this->name = $name;
        parent::__construct($id);
        $this->venue = $venue;
    }

    public function setVenue(Venue $venue)
    {
        $this->venue = $venue;
    }

    public function getVenue(): Venue
    {
        return $this->venue;
    }

    public function getFinder(): SpaceMapper
    {
        $reg = Registry::instance();
        return $reg->getSpaceMapper();
    }

    public function setName($name)
    {
        $this->name = $name;
        $this->markDirty();
    }

    public function getName(): string
    {
        return $this->name;
    }
}
