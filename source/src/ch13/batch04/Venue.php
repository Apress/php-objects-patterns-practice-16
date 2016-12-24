<?php
declare(strict_types = 1);

namespace popp\ch13\batch04;

class Venue extends DomainObject
{
    private $name;
    private $spaces = null;

    public function __construct(int $id, string $name)
    {
        $this->name = $name;
        parent::__construct($id);
    }


    public function getSpaces(): SpaceCollection
    {
        if (is_null($this->spaces)) {
            $reg = Registry::instance();
            $this->spaces = $reg->getSpaceCollection();
        }

        return $this->spaces;
    }

    public function setSpaces(SpaceCollection $spaces)
    {
        $this->spaces = $spaces;
    }

    public function addSpace(Space $space)
    {
        $this->getSpaces()->add($space);
        $space->setVenue($this);
    }

    // Venue

    public function getSpaces2()
    {
        if (is_null($this->spaces)) {
            $reg = Registry::instance();
            $finder = $reg->getSpaceMapper();
            $this->spaces = $finder->findByVenue($this->getId());
        }

        return $this->spaces;
    }

    public function getFinder(): Mapper
    {
        $reg = Registry::instance();

        return $reg->getVenueMapper();
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
