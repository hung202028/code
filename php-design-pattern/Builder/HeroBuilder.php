<?php

namespace Builder;

class HeroBuilder
{
    private Profession $profession;
    private string $name;
    private HairType $hairType;
    private HairColor $hairColor;
    private Armor $armor;
    private Weapon $weapon;

    public function withWeapon(Weapon $weapon): HeroBuilder
    {
        $this->weapon = $weapon;
        return $this;
    }

    public function withHairColor(HairColor $hairColor): HeroBuilder
    {
        $this->hairColor = $hairColor;
        return $this;
    }

    public function withHairType(HairType $hairType): HeroBuilder
    {
        $this->hairType = $hairType;
        return $this;
    }

    public function withName(string $name): HeroBuilder
    {
        $this->name = $name;
        return $this;
    }

    public function withProfession(Profession $profession): HeroBuilder
    {
        $this->profession = $profession;
        return $this;
    }

    public function withArmor(Armor $armor): HeroBuilder
    {
        $this->armor = $armor;
        return $this;
    }

    public function getProfession(): Profession
    {
        return $this->profession;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHairType(): HairType
    {
        return $this->hairType;
    }

    public function getHairColor(): HairColor
    {
        return $this->hairColor;
    }

    public function getArmor(): Armor
    {
        return $this->armor;
    }

    public function getWeapon(): Weapon
    {
        return $this->weapon;
    }

}
