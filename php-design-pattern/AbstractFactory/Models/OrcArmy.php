<?php

namespace AbstractFactory\Models;

class OrcArmy implements Army
{
    private string $name;

    public function __construct(array $config)
    {
        $this->name = $config['name'] ?? 'OrcArmy';
    }

    public function getDescription(): string
    {
        return sprintf('OrcArmy[name="%s"]', $this->name);
    }
}
