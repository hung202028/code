<?php
// https://leetcode.com/explore/learn/card/graph/619/depth-first-search-in-graph/3900/

class Solution
{
    /**
     * @param Node $node
     * @return Node
     */
    function cloneGraph($node)
    {
        if ($node == null) { return null; }

        $queue = new SplQueue();
        $queue->enqueue($node);

        $map = [$node->val => new Node($node->val)];
        while (!$queue->isEmpty()) {
            $current = $queue->dequeue();
            $cloned = $map[$current->val];

            foreach ($current->neighbors as $nb) {
                if (!isset($map[$nb->val])) {
                    $map[$nb->val] = new Node($nb->val);
                    $queue->enqueue($nb);
                }

                $cloned->neighbors[] = $map[$nb->val];
            }
        }

        return $map[$node->val];
    }
}

//Time Submitted: Faster than 80% php
//05/10/2022 04:05	Accepted	11 ms	20.5 MB	php
