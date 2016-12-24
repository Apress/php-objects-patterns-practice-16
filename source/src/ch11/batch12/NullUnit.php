<?php
declare(strict_types = 1);

namespace popp\ch11\batch12;

use popp\ch11\batch08\Unit;

/* listing 11.58 */
class NullUnit extends Unit
{
    public function bombardStrength(): int
    {
        return 0;
    }

    public function getHealth(): int
    {
        return 0;
    }

    public function getDepth(): int
    {
        return 0;
    }
/* /listing 11.58 */

    public function isNull(): bool
    {
        return true;
    }
/* listing 11.58 */
}
/* /listing 11.58 */
