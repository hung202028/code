<?php
// https://leetcode.com/problems/min-cost-climbing-stairs/

class Solution
{

    /**
     * @param Integer[] $cost
     * @return Integer
     */
    function minCostClimbingStairs($cost)
    {
        $len = count($cost);
        if ($len == 1) { return $cost[0]; }

        $dp = array_fill(0, $len + 1, 0);

        for ($i = 2; $i < $len + 1; $i++) {
            $oneStep = $dp[$i - 1] + $cost[$i - 1];
            $twoStep = $dp[$i - 2] + $cost[$i - 2];

            $dp[$i] = min($oneStep, $twoStep);
        }

        return $dp[$len];
    }
}
