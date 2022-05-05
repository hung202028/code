<?php
// https://leetcode.com/problems/number-of-provinces/

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
    }

    public function connected(int $x, int $y): bool
    {
        return $this->find($x) == $this->find($y);
    }

    public function countRoot(): int
    {
        $count = 0;
        foreach ($this->root as $v) {
            if ($v == -1) {
                $count++;
            }
        }
        return $count;
    }
}

class Solution
{

    /**
     * @param Integer[][] $isConnected
     * @return Integer
     */
    function findCircleNum($isConnected)
    {
        $len = count($isConnected);
        $uf = new QuickUnion($len);

        for ($i = 0; $i < $len; $i++) {
            for ($j = 0; $j < $len; $j++) {
                if ($isConnected[$i][$j] == 1 && $i != $j) {
                    $uf->union($i, $j);
                }
            }
        }

        return $uf->countRoot();
    }
}
