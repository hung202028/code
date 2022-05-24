<?php
// https://leetcode.com/problems/squares-of-a-sorted-array/

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortedSquares($nums)
    {
        $len = count($nums);
        $result = array_fill(0, $len, 0);

        $i = 0; $j = $len - 1;
        for ($n = $len - 1; $n >= 0; $n--) {
            if (abs($nums[$j]) >= abs($nums[$i])) {
                $result[$n] = $nums[$j] * $nums[$j];
                $j--;
            }
            else {
                $result[$n] = $nums[$i] * $nums[$i];
                $i++;
            }
        }

        return $result;
    }
}

