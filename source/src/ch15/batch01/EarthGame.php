<?php
/* listing 15.05 */
namespace popp\ch15\batch01;

use popp\ch10\batch06\PollutionDecorator;
use popp\ch10\batch06\DiamondDecorator;
use popp\ch10\batch06\Plains;

// begin class
/* /listing 15.05 */
/* listing 15.06 */
/*
class EarthGame extends Game implements
    Playable,
    Savable
*/
class EarthGame extends Game implements Playable, Savable
{
/* /listing 15.06 */
/* listing 15.08 */
    public function __construct(
        int $size,
        string $name,
        bool $wraparound = false,
        bool $aliens = false
    ) {
        // implementation
    }
/* /listing 15.08 */
/* listing 15.07 */
    final public static function generateTile(int $diamondCount, bool $polluted = false)
    {
        // implementation
/* /listing 15.07 */
/* listing 15.10 */
        $tile = [];
        for ($x = 0; $x < $diamondCount; $x++) {
            if ($polluted) {
                $tile[] = new PollutionDecorator(new DiamondDecorator(new Plains()));
            } else {
                $tile[] = new DiamondDecorator(new Plains());
            }
        }
/* /listing 15.10 */
        return $tile;
/* listing 15.07 */
    }
/* /listing 15.07 */

/* listing 15.06 */
}
/* /listing 15.06 */
