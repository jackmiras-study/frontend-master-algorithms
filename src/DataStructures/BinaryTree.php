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

class BinaryTree
{
    public function __construct(public BinaryNode $root) {}

    public function search(?BinaryNode $current, mixed $needle): bool
    {
        if ($current === null) {
            return false;
        }

        if ($current->value === $needle) {
            return true;
        }

        if ($needle < $current->value) {
            return $this->search($current->left, $needle);
        }

        if ($needle > $current->value) {
            return $this->search($current->right, $needle);
        }

        return false;
    }

    public function insert(?BinaryNode &$current, mixed $value): void
    {
        if ($current === null) {
            $current = new BinaryNode(value: $value);
            return;
        }

        if ($current->left === null || $value < $current->left->value) {
            $this->insert($current->left, $value);
        }

        if ($current->right === null || $value > $current->right->value) {
            $this->insert($current->right, $value);
        }
    }

    public function delete(?BinaryNode &$current, mixed $value)
    {
        if ($current->value === $value) {
            $current = null;
            return;
        }

        if ($value < $current->value) {
            $this->delete($current->left, $value);
        }

        if ($value > $current->value) {
            $this->delete($current->right, $value);
        }
    }
}
