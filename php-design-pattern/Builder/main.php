<?php

require_once '../autoload.php';

use Builder\HeroBuilder;
use Builder\Hero;
use Builder\Profession;
use Builder\Armor;
use Builder\Weapon;
use Builder\HairColor;
use Builder\HairType;

$builder = new HeroBuilder();
$builder->withName('DemoHero')
    ->withArmor(Armor::CHAIN_MAIL)
    ->withHairColor(HairColor::BLACK)
    ->withHairType(HairType::BALD)
    ->withProfession(Profession::PRIEST)
    ->withWeapon(Weapon::AXE);

$hero = new Hero($builder);
echo $hero;
