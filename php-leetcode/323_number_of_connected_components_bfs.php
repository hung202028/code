<?php
// https://leetcode.com/problems/number-of-connected-components-in-an-undirected-graph/

class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer
     */
    function countComponents($n, $edges)
    {
        if ($n == 1 ) { return 1; }

        $grid = array_fill(0, $n, array_fill(0, $n, 0));
        foreach ($edges as list($i, $j)) { $grid[$i][$j] = 1; $grid[$j][$i] = 1; }

        $visited = array_fill(0, $n, false);

        $result = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($visited[$i]) { continue; }

            $result++;
            $queue = new SplQueue();
            $queue->enqueue($i);

            while (!$queue->isEmpty()) {
                $v = $queue->dequeue();
                $visited[$v] = true;

                for ($j = 0; $j < $n; $j++) {
                    if (!$visited[$j] && $grid[$v][$j] == 1) {
                        $queue->enqueue($j);
                    }
                }
            }
        }

        return $result;
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
