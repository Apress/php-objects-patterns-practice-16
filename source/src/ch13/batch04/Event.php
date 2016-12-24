<?php
declare(strict_types = 1);

namespace popp\ch13\batch04;

class Event extends DomainObject
{
    private $start;
    private $duration;
    private $name;
    private $space;

    public function __construct(int $id, string $name, int $start, int $duration, Space $space)
    {
        parent::__construct($id);
        $this->name = $name;
        $this->start = $start;
        $this->duration = $duration;
        $this->space = $space;
    }

    public function setStart(int $start)
    {
        $this->start = $start;
        $this->markDirty();
    }

    public function getStart(): int
    {
        return $this->start;
    }

    public function setSpace(Space $space)
    {
        $this->space = $space;
        $this->markDirty();
    }

    public function getSpace(): Space
    {
        return $this->space;
    }

    public function setDuration(int $duration)
    {
        $this->duration = $duration;
        $this->markDirty();
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setName(string $name)
    {
        $this->name = $name_s;
        $this->markDirty();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFinder(): Mapper
    {
        $reg = Registry::instance();

        return $reg->getEventMapper();
    }
}
