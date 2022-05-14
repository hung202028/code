<?php
// https://leetcode.com/problems/shortest-path-in-binary-matrix/solution/

class Solution
{
    private array $directions = [
        [-1, -1],
        [-1, 0],
        [-1, 1],
        [0, -1],
        [0, 1],
        [1, -1],
        [1, 0],
        [1, 1]
    ];

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function shortestPathBinaryMatrix($grid)
    {
        $n = count($grid);

        if ($grid[0][0] != 0 || $grid[$n - 1][$n - 1] != 0) {
            return -1;
        }

        $queue = new SplQueue();
        $queue->enqueue([0, 0]);
        $grid[0][0] = 1;

        while (!$queue->isEmpty()) {
            list ($r, $c) = $queue->dequeue();
            $distance = $grid[$r][$c];

            if ($r == $n - 1 && $c == $n - 1) { return $distance; }

            foreach ($this->getNeighbors($r, $c, $grid, $n) as list ($r1, $c1)) {
                $queue->enqueue([$r1, $c1]);
                $grid[$r1][$c1] = $distance + 1;
            }
        }

        return -1;
    }

    function getNeighbors(int $row, int $col, array $grid, int $n): array
    {
        $neighbors = [];

        foreach ($this->directions as list ($r, $c)) {
            $newRow = $row + $r;
            $newCol = $col + $c;

            if ($newRow < 0 || $newRow >= $n ||
                $newCol < 0 || $newCol >= $n ||
                $grid[$newRow][$newCol] != 0) {
                continue;
            }

            $neighbors[] = [$newRow, $newCol];
        }

        return $neighbors;
    }
}
