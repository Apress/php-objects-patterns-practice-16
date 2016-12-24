<?php
declare(strict_types = 1);

namespace popp\ch09\batch11;

class Runner
{
    public static function run()
    {
/* listing 09.32 */
        $factory = new TerrainFactory(
            new EarthSea(),
            new EarthPlains(),
            new EarthForest()
        );
        print_r($factory->getSea());
        print_r($factory->getPlains());
        print_r($factory->getForest());
/* /listing 09.32 */
    }
}
