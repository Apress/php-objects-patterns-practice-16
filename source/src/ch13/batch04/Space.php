<?php
declare(strict_types = 1);

namespace popp\ch13\batch04;

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

/* listing 13.25 */

    // Space

    public function setVenue(Venue $venue)
    {
        $this->venue = $venue;
        $this->markDirty();
    }

    public function setName(string $name)
    {
        $this->name = $name;
        $this->markDirty();
    }
/* /listing 13.25 */

    public function setEvents(EventCollection $collection)
    {
        $this->events = $collection;
    }

    public function getEvents()
    {
        return $this->events;
    }

/* listing 13.28 */

    // Space

    public function getEvents2()
    {
        if (is_null($this->events)) {
            $this->events = $this->getFinder()->findByScaceId($this->getId());
        }

        return $this->events;
    }
/* /listing 13.28 */

    public function getVenue(): Venue
    {
        return $this->venue;
    }

    public function getFinder(): Mapper
    {
        $reg = Registry::instance();

        return $reg->getSpaceMapper();
    }

    public function getName(): string
    {
        return $this->name;
    }
}
