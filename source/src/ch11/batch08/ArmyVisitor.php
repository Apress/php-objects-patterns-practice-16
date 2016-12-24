<?php
declare(strict_types = 1);

namespace popp\ch11\batch08;

/* listing 11.41 */
abstract class ArmyVisitor
{
    abstract public function visit(Unit $node);

    public function visitArcher(Archer $node)
    {
        $this->visit($node);
    }
    public function visitCavalry(Cavalry $node)
    {
        $this->visit($node);
    }

    public function visitLaserCanonUnit(LaserCanonUnit $node)
    {
        $this->visit($node);
    }

    public function visitTroopCarrierUnit(TroopCarrierUnit $node)
    {
        $this->visit($node);
    }

    public function visitArmy(Army $node)
    {
        $this->visit($node);
    }
}
