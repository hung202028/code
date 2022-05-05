<?php

namespace AbstractFactory\Models;

class OrcKing implements King
{
    private string $name;

    public function __construct(array $config)
    {
        $this->name = $config['name'] ?? 'OrcKing';
    }

    public function getDescription(): string
    {
        return sprintf('OrcKing[name="%s"]', $this->name);
    }
}
