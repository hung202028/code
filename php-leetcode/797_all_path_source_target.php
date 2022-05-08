<?php
// https://leetcode.com/problems/all-paths-from-source-to-target/

class Solution
{
    private array $adjList = [];
    private array $visited = [];
    private array $paths = [];
    private int $target;

    private function backtrack(int $currentNode, array &$currentPath)
    {
        if ($currentNode == $this->target) {
            $this->paths[] = $currentPath;
            return;
        }

        $this->visited[$currentNode] = true;
        foreach ($this->adjList[$currentNode] as $node) {
            if ($this->visited[$node]) {
                continue;
            }

            $currentPath[] = $node;
            $this->backtrack($node, $currentPath);
            array_pop($currentPath);
        }
        $this->visited[$currentNode] = false;
    }

    /**
     * @param Integer[][] $graph
     * @return Integer[][]
     */
    function allPathsSourceTarget($graph)
    {
        $n = count($graph);
        $this->target = $n - 1;
        $this->adjList = $graph;
        $this->visited = array_fill(0, $n, false);

        $currentPath = [0];
        $this->backtrack(0, $currentPath);

        return $this->paths;
    }
}
