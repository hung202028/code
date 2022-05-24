<?php
// https://leetcode.com/problems/consecutive-characters/

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function maxPower($s)
    {
        $n = strlen($s);
        if ($n <= 1) { return $n; }

        $result = 0; $current = 1;
        for ($i = 1; $i < $n; $i++) {
            if ($s[$i] == $s[$i - 1]) {
                $current++;
            } else {
                $result = max($current, $result);
                $current = 1;
            }
        }

        return max($current, $result);
    }
}
