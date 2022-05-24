<?php
// https://leetcode.com/problems/replace-elements-with-greatest-element-on-right-side/

class Solution
{

    /**
     * @param Integer[] $arr
     * @return Integer[]
     */
    function replaceElements(&$arr)
    {
        $len = count($arr);
        if ($len == 1) { return [-1]; }

        $max = $arr[$len - 1];
        $arr[$len - 1] = -1;

        for ($i = $len - 2; $i >= 0; $i--) {
            $val = $arr[$i];
            $arr[$i] = $max;
            $max = max($val, $max);
        }

        return $arr;
    }
}
