<?php
declare(strict_types = 1);

namespace popp\ch11\batch08;

/* listing 11.39 */
abstract class Unit
{
    // ...
/* /listing 11.39 */
    protected $health = 10;
    protected $depth = 0;

    public function getComposite()
    {
        return null;
    }

    abstract public function bombardStrength();

    public function getHealth(): int
    {
        return $this->health;
    }

    public function isNull(): bool
    {
        return false;
    }
/* listing 11.39 */
    public function accept(ArmyVisitor $visitor)
    {
        $refthis = new \ReflectionClass(get_class($this));
        $method = "visit" . $refthis->getShortName();
        $visitor->$method($this);
    }

    protected function setDepth($depth)
    {
        $this->depth = $depth;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }
}
/* /listing 11.39 */
