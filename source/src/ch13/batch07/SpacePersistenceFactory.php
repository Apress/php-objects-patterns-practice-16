<?php
declare(strict_types = 1);

namespace popp\ch13\batch07;

class SpacePersistenceFactory extends PersistenceFactory
{
    public function getMapper(): Mapper
    {
        return new SpaceMapper();
    }

    public function getDomainObjectFactory(): DomainObjectFactory
    {
        return new SpaceObjectFactory();
    }

    public function getCollection(array $array): Collection
    {
        return new SpaceCollection($array, $this->getDomainObjectFactory());
    }

    public function getSelectionFactory(): SelectionFactor
    {
        return new SpaceSelectionFactory();
    }

    public function getUpdateFactory(): UpdateFactory
    {
        return new SpaceUpdateFactory();
    }

    public function getIdentityObject(): IdentityObject
    {
        return new SpaceIdentityObject();
    }
}
