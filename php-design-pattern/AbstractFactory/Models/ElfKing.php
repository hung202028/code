<?php
namespace AbstractFactory\Models;

class ElfKing implements King
{
    private string $name;

    public function __construct(array $config)
    {
        $this->name = $config['name'] ?? 'ElfKing';
    }

    public function getDescription(): string
    {
        return sprintf('ElfKing[name="%s"]', $this->name);
    }
}
