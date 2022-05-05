<?php

namespace AbstractFactory\Models;

class OrcCastle implements Castle
{
    private string $name;

    public function __construct(array $config)
    {
        $this->name = $config['name'] ?? 'OrcCastle';
    }

    public function getDescription(): string
    {
        return sprintf('OrcCastle[name="%s"]', $this->name);
    }
}
