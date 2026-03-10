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

class BinaryTreePreOrder
{
    private function walk(?BinaryNode $current, array &$path): array
    {
        if ($current === null) {
            return $path;
        }

        $path[] = $current->value;
        $this->walk($current->left, $path);
        $this->walk($current->right, $path);

        return $path;
    }

    public function traverse(BinaryNode $tree): array
    {
        $path = [];
        return $this->walk($tree, $path);
    }
}
