<?php

namespace Builder;
use stdClass;

class MySQLQueryBuilder implements QueryBuilder
{
    /** @var stdClass $query */
    protected $query;

    protected function reset()
    {
        $this->query = new stdClass();
    }

    public function select(string $table, array $fields = []): QueryBuilder
    {
        $this->reset();
        $this->query->base = sprintf('SELECT %s FROM %s', implode(',', $fields), $table);
        $this->query->type = QueryType::SELECT;

        return $this;
    }

    public function where(string $cond): QueryBuilder
    {
        if (!in_array($this->query->type, [QueryType::SELECT, QueryType::DELETE, QueryType::UPDATE])) {
            throw new Exception('Where can only be used in select, delete or update!');
        }

        $this->query->where[] = $cond;
        return $this;
    }

    public function limit(int $count, int $offset): QueryBuilder
    {
        if ($this->query->type != QueryType::SELECT) {
            throw new Exception('');
        }

        $this->query->limit = sprintf(' LIMIT %s OFFSET %s', $count, $offset);
        return $this;
    }

    public function assemble(): string
    {
        $sql = $this->query->base;

        if (!empty($this->query->where)) {
            $sql .= sprintf(' WHERE %s', implode(' AND ', $this->query->where));
        }

        if (isset($this->query->limit)) {
            $sql .= $this->query->limit;
        }

        $sql .= ';';

        return $sql;
    }
}
