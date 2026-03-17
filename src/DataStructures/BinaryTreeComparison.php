<?php

namespace FrontendMaster\Algorithms\DataStructures;

class BinaryNode
{
    public function __construct(
        public mixed $value,
        public ?BinaryNode $left = null,
        public ?BinaryNode $right = null
    ) {}
}

class BinaryTreeComparison
{
    public function compare(?BinaryNode $a, ?BinaryNode $b): bool
    {
        if ($a === null && $b === null) {
            return true;
        }

        if ($a === null || $b === null) {
            return false;
        }

        if ($a->value !== $b->value) {
            return false;
        }

        return $this->compare($a->left, $b->left) && $this->compare($a->right, $b->right);
    }
}
