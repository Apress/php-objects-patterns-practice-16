<?php

namespace popp\ch12\batch07;

// fake mapper
class VenueMapper
{
    private $fakevenues = [
        "Likey Lounge",
        "Happy House"
    ];

    public function findAll()
    {
        $ret = [];

        foreach ($this->fakevenues as $venuename) {
            $ret[] = new Venue($venuename);
        }

        return $ret;
    }
}
