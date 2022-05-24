<?php
// https://leetcode.com/problems/max-consecutive-ones/

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaxConsecutiveOnes($nums)
    {
        $result = 0; $current = 0;
        foreach ($nums as $val) {
            if ($val == 0) {
                $result = max($current, $result);
                $current = 0;
            } else {
                $current++;
            }
        }

        return max($current, $result);
    }
}
