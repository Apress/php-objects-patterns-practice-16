<?php
declare(strict_types=1);

namespace popp\ch05\batch08;

/* listing 05.49 */
class PersonModule implements Module
{
    public function setPerson(Person $person)
    {
        print "PersonModule::setPerson(): {$person->name}\n";
    }

    public function execute()
    {
        // do things
    }
}
