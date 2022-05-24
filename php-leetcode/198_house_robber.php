<?php
// https://leetcode.com/problems/house-robber/

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums)
    {
        $len = count($nums);
        if ($len == 1) { return $nums[0]; }

        $dp = array_fill(0, $len, 0);
        $dp[0] = $nums[0]; $dp[1] = max($nums[0], $nums[1]);

        for ($i = 2; $i < $len; $i++) {
            $dp[$i] = max($dp[$i - 1], $dp[$i - 2] + $nums[$i]);
        }

        return $dp[$len - 1];
    }
}
