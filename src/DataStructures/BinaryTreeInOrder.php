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

class BinaryTreeInOrder
{
    private function walk(?BinaryNode $current, array &$path): array
    {
        if ($current === null) {
            return $path;
        }

        $this->walk($current->left, $path);
        $path[] = $current->value;
        $this->walk($current->right, $path);

        return $path;
    }

    public function traverse(BinaryNode $tree)
    {
        $path = [];
        return $this->walk($tree, $path);
    }
}
