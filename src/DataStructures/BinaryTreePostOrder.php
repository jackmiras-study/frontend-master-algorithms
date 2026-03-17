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


class BinaryTreePostOrder
{
    private function walk(?BinaryNode $current, array &$path)
    {
        if ($current === null) {
            return $path;
        }

        $this->walk($current->left, $path);
        $this->walk($current->right, $path);
        $path[] = $current->value;

        return $path;
    }

    public function traverse(BinaryNode $tree): array
    {
        $path = [];
        return $this->walk($tree, $path);
    }
}
