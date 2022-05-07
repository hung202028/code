<?php
// https://leetcode.com/problems/number-of-connected-components-in-an-undirected-graph/


class QuickUnion
{
    private int $size;
    private array $root;
    private array $rank;
    private int $count;

    public function __construct(int $size = 0)
    {
        $this->count = $size;
        $this->size = $size;
        $this->root = array_fill(0, $size, -1);
        $this->rank = array_fill(0, $size, 1);
    }

    public function find(int $x): int
    {
        assert($x >= 0 && $x < $this->size);

        while ($this->root[$x] != -1) {
            $x = $this->root[$x];
        }

        return $x;
    }

    public function union(int $x, int $y)
    {
        assert($x >= 0 && $x < $this->size && $y >= 0 && $y < $this->size);

        $rootX = $this->find($x);
        $rootY = $this->find($y);

        if ($rootX == $rootY) {
            return;
        }

        if ($this->rank[$rootX] > $this->rank[$rootY]) {
            $this->root[$rootY] = $rootX;
        } elseif ($this->rank[$rootX] < $this->rank[$rootY]) {
            $this->root[$rootX] = $rootY;
        } else {
            $this->root[$rootY] = $rootX;
            $this->rank[$rootX] += 1;
        }

        $this->count -= 1;
    }

    public function connected(int $x, int $y): bool
    {
        return $this->find($x) == $this->find($y);
    }

    public function countRoot(): int
    {
        return $this->count;
    }
}


class Solution
{
    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function countComponents($n, $edges)
    {
        if ($n == 1) { return 1; }

        $qu = new QuickUnion($n);
        foreach ($edges as list($i, $j)) {
            $qu->union($i, $j);
        }

        return $qu->countRoot();
    }
}

// Note:

// BFS:
//05/07/2022 13:28	Accepted	1249 ms	152 MB	    php
//05/07/2022 13:28	Accepted	734 ms	151.6 MB	php
//05/07/2022 13:28	Accepted	993 ms	151.5 MB	php

// Quick Union:
// 05/07/2022 13:29	Accepted	40 ms	22.7 MB	php
// 05/07/2022 13:29	Accepted	59 ms	23.1 MB	php
// 05/07/2022 13:29	Accepted	58 ms	22.7 MB	php
