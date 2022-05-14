<?php
// https://leetcode.com/problems/n-ary-tree-level-order-traversal/


class Solution
{
    /**
     * @param Node $root
     * @return integer[][]
     */
    function levelOrder($root)
    {
        if ($root == null) { return []; }

        $result = [];
        $queue = new SplQueue();
        $queue->enqueue($root);

        while (!$queue->isEmpty()) {
            $n = $queue->count();

            $arr = [];
            for ($i = 0; $i < $n; $i++) {
                $node = $queue->dequeue();
                $arr[] = $node->val;

                foreach ($node->children as $child) { $queue->enqueue($child); }
            }
            $result[] = $arr;
        }

        return $result;
    }
}
