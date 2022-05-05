<?php
// https://leetcode.com/problems/graph-valid-tree/

class QuickUnion
{
    private int $size;
    private array $root;
    private array $rank;

    public function __construct(int $size = 0)
    {
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

    public function union(int $x, int $y): bool
    {
        assert($x >= 0 && $x < $this->size && $y >= 0 && $y < $this->size);

        $rootX = $this->find($x);
        $rootY = $this->find($y);

        if ($rootX == $rootY) {
            return false;
        }

        if ($this->rank[$rootX] > $this->rank[$rootY]) {
            $this->root[$rootY] = $rootX;
        } elseif ($this->rank[$rootX] < $this->rank[$rootY]) {
            $this->root[$rootX] = $rootY;
        } else {
            $this->root[$rootY] = $rootX;
            $this->rank[$rootX] += 1;
        }

        return true;
    }

    public function connected(int $x, int $y): bool
    {
        return $this->find($x) == $this->find($y);
    }
}


class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Boolean
     */
    function validTree($n, $edges)
    {
        if ($n == 1) { return true; }
        if (count($edges) != $n - 1) { return false; }

        $uf = new QuickUnion($n);
        foreach ($edges as $edge) {
            list ($i, $j) = $edge;
            if (!$uf->union($i, $j)) {
                return false;
            }
        }

        return true;
    }
}
