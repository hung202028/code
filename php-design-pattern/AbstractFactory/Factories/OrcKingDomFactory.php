<?php

namespace AbstractFactory\Factories;

use AbstractFactory\Models\Army;
use AbstractFactory\Models\Castle;
use AbstractFactory\Models\King;
use AbstractFactory\Models\OrcArmy;
use AbstractFactory\Models\OrcCastle;
use AbstractFactory\Models\OrcKing;

class OrcKingDomFactory implements KingDomFactory
{
    public function createArmy(array $config = []): Army
    {
        return new OrcArmy($config);
    }

    public function createCastle(array $config = []): Castle
    {
        return new OrcCastle($config);
    }

    public function createKing(array $config = []): King
    {
        return new OrcKing($config);
    }
}
