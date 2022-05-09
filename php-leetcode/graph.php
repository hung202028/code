<?php

class Node
{
    public int $val;
    public array|null $neighbors;

    public function __construct(int $val)
    {
        $this->val = $val;
        $this->neighbors = [];
    }
}
