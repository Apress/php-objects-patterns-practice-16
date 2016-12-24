<?php
declare(strict_types = 1);

namespace popp\ch10\batch06;

/* listing 10.22 */
abstract class TileDecorator extends Tile
{
    protected $tile;

    public function __construct(Tile $tile)
    {
        $this->tile = $tile;
    }
}
/* /listing 10.22 */
