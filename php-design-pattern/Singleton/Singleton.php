<?php

namespace Singleton;

class Singleton
{
    private static $instances = [];

    protected function __construct()
    {
    }

    // Singleton should not be cloneable
    private function __clone(): void
    {
    }

    // Singleton should not be restoreable from string
    public function __wakeup(): void
    {
        throw new Exception('Cannot unseriablize a singleton');
    }

    // Allow to subclass the Singleton class while keeping just one instance
    // of each subclass around.
    public static function getInstance(): Singleton
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }
        return self::$instances[$cls];
    }
}
