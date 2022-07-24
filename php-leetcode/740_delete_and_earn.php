<?php
// https://leetcode.com/problems/delete-and-earn/

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function deleteAndEarn($nums)
    {
        $len = count($nums);
        if ($len == 1) { return $nums[0]; }

        $maxNum = max($nums);
        $map = array_count_values($nums);

        $twoBack = 0;
        $oneBack = $map[1] ?? 0;

        for ($i = 2; $i <= $maxNum; $i++) {
            $temp = $oneBack;
            $oneBack = max($twoBack + $i * ($map[$i] ?? 0), $oneBack);
            $twoBack = $temp;
        }

        return $oneBack;
    }
}
