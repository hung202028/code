<?php
// https://leetcode.com/problems/min-cost-to-connect-all-points/

class Solution
{

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function minCostConnectPoints($points)
    {
        if (empty($points)) {
            return 0;
        }

        $len = count($points);
        $edges = $this->buildEdges($points, $len);

        $qu = new QuickUnion($len);
        $n = $len - 1;

        $result = 0;
        while (!$edges->isEmpty() && $n > 0) {
            list ($p1, $p2, $cost) = $edges->extract();
            if (!$qu->connected($p1, $p2)) {
                $qu->union($p1, $p2);
                $result += $cost;
                $n--;
            }
        }
        return $result;
    }

    function buildEdges($points, $len): MinHeap
    {
        $edges = new MinHeap();

        for ($i = 0; $i < $len - 1; $i++) {
            list ($x1, $y1) = $points[$i];
            for ($j = $i + 1; $j < $len; $j++) {
                list ($x2, $y2) = $points[$j];
                $cost = abs($x1 - $x2) + abs($y1 - $y2);

                $edges->insert([$i, $j, $cost]);
            }
        }

        return $edges;
    }
}

class MinHeap extends SplMinHeap
{
    protected function compare(mixed $value1, mixed $value2): int
    {
        $cost1 = $value1[2]; $cost2 = $value2[2];
        if ($cost1 < $cost2) { return 1; } // minHeap

        return $cost1 == $cost2 ? 0 : -1;
    }
}

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

