<?php
declare(strict_types = 1);

namespace popp\ch12\batch10;

/* listing 12.41 */
class VenueManager extends Base
{
    private $addvenue = "INSERT INTO venue
                          ( name )
                          VALUES( ? )";

    private $addspace  = "INSERT INTO space
                          ( name, venue )
                          VALUES( ?, ? )";

    private $addevent =  "INSERT INTO event
                          ( name, space, start, duration )
                          VALUES( ?, ?, ?, ? )";

    // ...

/* /listing 12.41 */

/* listing 12.42 */

    // VenueManager

    public function addVenue(string $name, array $spaces): array
    {
        $pdo = $this->getPdo();
        $ret = [];
        $ret['venue'] = [$name];
        $stmt = $pdo->prepare($this->addvenue);
        $stmt->execute($ret['venue']);
        $vid = $pdo->lastInsertId();

        $ret['spaces'] = [];

        $stmt = $pdo->prepare($this->addspace);

        foreach ($spaces as $spacename) {
            $values = [$spacename, $vid];
            $stmt->execute($values);
            $sid = $pdo->lastInsertId();
            array_unshift($values, $sid);
            $ret['spaces'][] = $values;
        }

        return $ret;
    }
/* /listing 12.42 */

/* listing 12.43 */

    // VenueManager

    public function bookEvent(int $spaceid, string $name, int $time, int $duration)
    {
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare($this->addevent);
        $stmt->execute([$name, $spaceid, $time, $duration]);
    }
/* /listing 12.43 */
}
