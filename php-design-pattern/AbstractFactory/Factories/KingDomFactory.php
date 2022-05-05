<?php

namespace AbstractFactory\Factories;

use AbstractFactory\Models\Army;
use AbstractFactory\Models\Castle;
use AbstractFactory\Models\King;

interface KingDomFactory
{
    public function createArmy(array $config = []): Army;

    public function createCastle(array $config = []): Castle;

    public function createKing(array $config = []): King;
}
