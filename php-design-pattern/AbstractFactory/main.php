<?php

require_once '../autoload.php';

use AbstractFactory\Factories\FactoryMaker;
use AbstractFactory\Models\KingDomType;
use AbstractFactory\Models\KingDom;

class Application
{
    public function example1()
    {
        $factory = FactoryMaker::createFactory(KingDomType::ELF);
        $kingdom = new KingDom(
            king: $factory->createKing(),
            castle: $factory->createCastle(),
            army: $factory->createArmy(),
        );

        echo $kingdom . "\n";

        $factory = FactoryMaker::createFactory(KingDomType::ORC);
        $kingdom = new KingDom(
            king: $factory->createKing(),
            castle: $factory->createCastle(),
            army: $factory->createArmy()
        );

        echo $kingdom . "\n";
    }

    public function example2()
    {
        // Need to install yaml extension:
        // 1: brew install libyaml
        // 2: pecl install yaml
        // 3: Please provide the prefix of libyaml installation [autodetect] : /opt/homebrew/Cellar/libyaml/0.2.5
        $config = yaml_parse_file(__DIR__ . DIRECTORY_SEPARATOR . "config.yaml");

        $type = KingDomType::from($config['kingdom']['type'] ?? KingDomType::ELF->value);
        $army = $config['kingdom']['data']['army'] ?? [];
        $castle = $config['kingdom']['data']['castle'] ?? [];
        $king = $config['kingdom']['data']['king'] ?? [];

        $factory = FactoryMaker::createFactory($type);
        $kingdom = new KingDom(
            king: $factory->createKing($king),
            army: $factory->createArmy($army),
            castle: $factory->createCastle($castle),
        );

        echo $kingdom;
    }
}

$app = new Application();
$app->example1();
$app->example2();
