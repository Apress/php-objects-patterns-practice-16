<?php
declare(strict_types = 1);

namespace popp\ch13\batch05;

class SpacePersistenceFactory extends PersistenceFactory
{
    public function getMapper(): Mapper
    {
        return new SpaceMapper();
    }

    public function getDomainObjectFactory(): ObjectFactory
    {
        return new SpaceObjectFactory();
    }

    public function getCollection(array $row): Collection
    {
        return new SpaceCollection($row, $this->getDomainObjectFactory());
    }
}
