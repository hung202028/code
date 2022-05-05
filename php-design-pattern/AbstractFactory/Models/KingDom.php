<?php

namespace AbstractFactory\Models;

class KingDom
{
    public function __construct(
        private King   $king,
        private Castle $castle,
        private Army   $army
    )
    {
    }

    public function __toString(): string
    {
        $kingDesc = $this->king->getDescription();
        $castleDesc = $this->castle->getDescription();
        $armyDesc = $this->army->getDescription();

        return sprintf('KingDom[%s %s %s]', $kingDesc, $castleDesc, $armyDesc);
    }
}
