<?php

namespace FrontendMaster\Algorithms\DataStructures;

use SplQueue;

class BinaryNode
{
    public function __construct(
        public mixed $value,
        public ?BinaryNode $left = null,
        public ?BinaryNode $right = null,
    ) {}
}

class BinaryTreeBreadthFirstSearch
{
    public function search(BinaryNode $head, int $needle): bool
    {
        $queue = new SplQueue();
        $queue->enqueue($head);

        while ($queue->count()) {
            $current = $queue->dequeue();

            if ($current === null) {
                return false;
            }

            if ($current->value === $needle) {
                return true;
            }

            if (is_null($current->left) === false) {
                $queue->enqueue($current->left);
            }

            if (is_null($current->right) === false) {
                $queue->enqueue($current->right);
            }
        }

        return false;
    }
}
