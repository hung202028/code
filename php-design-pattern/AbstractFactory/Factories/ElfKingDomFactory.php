<?php

namespace AbstractFactory\Factories;

use AbstractFactory\Models\Army;
use AbstractFactory\Models\Castle;
use AbstractFactory\Models\ElfArmy;
use AbstractFactory\Models\ElfCastle;
use AbstractFactory\Models\ElfKing;
use AbstractFactory\Models\King;

class ElfKingDomFactory implements KingDomFactory
{

    public function createArmy(array $config = []): Army
    {
        return new ElfArmy($config);
    }

    public function createCastle(array $config = []): Castle
    {
        return new ElfCastle($config);
    }

    public function createKing(array $config = []): King
    {
        return new ElfKing($config);
    }
}
