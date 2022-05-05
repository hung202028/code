<?php

namespace AbstractFactory\Models;

class ElfArmy implements Army
{
    private string $name;

    public function __construct(array $config)
    {
        $this->name = $config['name'] ?? 'ElfArmy';
    }

    public function getDescription(): string
    {
        return sprintf('ElfArmy[name="%s"]', $this->name);
    }
}
