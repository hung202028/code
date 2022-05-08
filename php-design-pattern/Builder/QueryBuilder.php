<?php

namespace Builder;

interface QueryBuilder
{
    public function select(string $table, array $fields = []): QueryBuilder;

    public function where(string $cond): QueryBuilder;

    public function limit(int $count, int $offset): QueryBuilder;

    public function assemble(): string;
}
