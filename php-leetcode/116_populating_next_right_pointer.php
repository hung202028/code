<?php
// https://leetcode.com/problems/populating-next-right-pointers-in-each-node/

class Solution
{
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root)
    {
        if ($root == null) { return $root; }

        $queue = new SplQueue();
        $queue->enqueue($root);

        while (!$queue->isEmpty()) {
            $size = $queue->count();
            for ($i = 0; $i < $size; $i++) {
                $node = $queue->dequeue();

                if ($i < $size - 1) {
                    $node->next = $queue->bottom();
                }

                $node->left && $queue->enqueue($node->left);
                $node->right && $queue->enqueue($node->right);
            }
        }

        return $root;
    }
}
