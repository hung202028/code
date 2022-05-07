<?php

namespace Builder;

class Hero
{
    private Profession $profession;
    private string $name;
    private HairType $hairType;
    private HairColor $hairColor;
    private Armor $armor;
    private Weapon $weapon;

    public function __construct(HeroBuilder $builder)
    {
        $this->name = $builder->getName();
        $this->profession = $builder->getProfession();
        $this->armor = $builder->getArmor();
        $this->hairColor = $builder->getHairColor();
        $this->hairType = $builder->getHairType();
        $this->name = $builder->getName();
        $this->weapon = $builder->getWeapon();
    }

    public function __toString(): string
    {
        return sprintf('Hero[name="%s",profession="%s",hairType="%s",hairColor="%s",armor="%s",weapon="%s"]',
            $this->name,
            $this->profession->value,
            $this->hairType->value,
            $this->hairColor->value,
            $this->armor->value,
            $this->weapon->value,
        );
    }
}
