<?php
declare(strict_types = 1);

namespace popp\ch13\batch05;

use popp\ch13\batch04\ObjectWatcher;
use popp\ch13\batch04\DomainObject;

/* listing 13.31 */
abstract class DomainObjectFactory
{
    abstract public function createObject(array $row): DomainObject;

/* /listing 13.31 */
    protected function getFromMap($class, $id)
    {
        return ObjectWatcher::exists($class, $id);
    }

    protected function addToMap(DomainObject $obj): DomainObject
    {
        return ObjectWatcher::add($obj);
    }
/* listing 13.31 */
}
/* /listing 13.31 */
