<?php

namespace AbstractFactory\Models;

class ElfCastle implements Castle
{
    private string $name;

    public function __construct(array $config)
    {
        $this->name = $config['name'] ?? 'ElfCastle';
    }

    public function getDescription(): string
    {
        return sprintf('ElfCastle[name="%s"]', $this->name);
    }
}
