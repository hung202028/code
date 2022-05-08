<?php

namespace Singleton;

class Config extends Singleton
{
    private array $map = [];

    public function getValue(string $key): mixed
    {
        return $this->map[$key] ?? null;
    }

    public function setValue(string $key, mixed $value)
    {
        $this->map[$key] = $value;
    }
}
