<?php
// https://leetcode.com/problems/smallest-string-with-swaps/

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

        $adjList = array_fill(0, $n, []);
        foreach ($pairs as list($i, $j)) { $adjList[$i][] = $j; $adjList[$j][] = $i; }

        $res = $s;
        $visited = array_fill(0, $n, false);

        for ($i = 0; $i < $n; $i++) {
            if ($visited[$i]) { continue; }

            $queue = new SplQueue();
            $queue->enqueue($i);

            $indices = []; $chars = [];
            while (!$queue->isEmpty()) {
                $v = $queue->dequeue();
                if ($visited[$v]) { continue; }

                $visited[$v] = true;

                $indices[] = $v; $chars[] = $s[$v];
                foreach ($adjList[$v] as $j) {
                    $queue->enqueue($j);
                }
            }

            sort($chars); sort($indices);
            $m = count($chars);
            for ($j = 0; $j < $m; $j++) { $res[$indices[$j]] = $chars[$j]; }
        }

        return $res;
    }
}
