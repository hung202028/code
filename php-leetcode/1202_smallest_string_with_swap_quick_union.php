<?php
// https://leetcode.com/problems/smallest-string-with-swaps/


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
            $this->rank[$rootX] += $this->rank[$rootY];
        }
    }

    public function connected(int $x, int $y): bool
    {
        return $this->find($x) == $this->find($y);
    }
}


class Solution
{
    /**
     * @param String $s
     * @param Integer[][] $pairs
     * @return String
     */
    function smallestStringWithSwaps($s, $pairs)
    {
        $n = strlen($s);

        $qu = new QuickUnion($n);
        foreach ($pairs as list ($i, $j)) { $qu->union($i, $j); }

        $map = [];
        for ($i = 0; $i < $n; $i++) {
            $root = $qu->find($i);
            $arr = $map[$root] ?? [];
            $arr[] = $i; $map[$root] = $arr;
        }

        $res = $s;
        foreach ($map as $_ => $arr) {
            $chars = array_map(function ($index) use ($s) { return $s[$index]; }, $arr);
            sort($chars);

            $m = count($chars);
            for ($i = 0; $i < $m; $i++) {
                $res[$arr[$i]] = $chars[$i];
            }
        }

        return $res;
    }
}

// Note: TLE
