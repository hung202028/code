<?php
// https://leetcode.com/problems/number-of-provinces/

class Solution
{

    /**
     * @param Integer[][] $isConnected
     * @return Integer
     */
    function findCircleNum($isConnected)
    {
        $len = count($isConnected);
        $result = 0;
        $visited = array_fill(0, $len, false);

        for ($i = 0; $i < $len; $i++) {
            if ($visited[$i]) { continue; }

            $result++;

            $queue = new SplQueue();
            $queue->enqueue($i);

            while (!$queue->isEmpty()) {
                $v = $queue->dequeue();
                $visited[$v] = true;

                for ($j = 0; $j < $len; $j++) {
                    if (!$visited[$j] && $isConnected[$v][$j] == 1) {
                        $queue->enqueue($j);
                    }
                }
            }
        }

        return $result;
    }
}
