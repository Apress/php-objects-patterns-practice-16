<?php
declare(strict_types = 1);

namespace popp\ch13\batch07;

class EventPersistenceFactory extends PersistenceFactory
{
    public function getMapper()
    {
        return new EventMapper();
    }

    public function getDomainObjectFactory()
    {
        return new EventObjectFactory();
    }

    public function getCollection(array $array)
    {
        return new EventCollection($array, $this->getDomainObjectFactory());
    }

    public function getSelectionFactory()
    {
        return new EventSelectionFactory();
    }

    public function getUpdateFactory()
    {
        return new EventUpdateFactory();
    }

    public function getIdentityObject()
    {
        return new EventIdentityObject();
    }
}
