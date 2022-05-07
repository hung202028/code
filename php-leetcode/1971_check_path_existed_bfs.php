<?php
// https://leetcode.com/problems/find-if-path-exists-in-graph/

class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Integer $source
     * @param Integer $destination
     * @return Boolean
     */
    function validPath($n, $edges, $source, $destination)
    {
        $adjList = array_fill(0, $n, []);
        foreach ($edges as list($i, $j)) { $adjList[$i][] = $j; $adjList[$j][] = $i; }

        $visited = array_fill(0, $n, false);

        $queue = new SplQueue();
        $queue->enqueue($source);

        while (!$queue->isEmpty()) {
            $v = $queue->dequeue();
            if ($v == $destination) { return true; }

            $visited[$v] = true;
            foreach ($adjList[$v] as $i) {
                if (!$visited[$i]) { $queue->enqueue($i); }
            }
        }

        return false;
    }
}
