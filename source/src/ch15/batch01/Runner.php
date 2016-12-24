<?php
declare(strict_types = 1);

namespace popp\ch15\batch01;

class Runner
{
    public static function run()
    {
/* listing 15.09 */
        $earthgame = new EarthGame(
            5,
            "earth",
            true,
            true
        );
        $earthgame::generateTile(5, true);
/* /listing 15.09 */
    }
}
