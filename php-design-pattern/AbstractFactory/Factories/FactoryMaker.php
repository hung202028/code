<?php

namespace AbstractFactory\Factories;

use AbstractFactory\Models\KingDomType;

class FactoryMaker
{
    public static function createFactory(KingDomType $type): KingDomFactory
    {
        switch ($type) {
            case KingDomType::ORC:
                return new OrcKingDomFactory();
            case KingDomType::ELF:
                return new ElfKingDomFactory();
            default:
                throw new Exception('Unknown kingdom type');
        }
    }
}
