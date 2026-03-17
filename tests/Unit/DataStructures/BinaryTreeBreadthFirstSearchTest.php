<?php

namespace Test\Unit\DataStructures;

use FrontendMaster\Algorithms\DataStructures\BinaryNode;
use FrontendMaster\Algorithms\DataStructures\BinaryTreeBreadthFirstSearch;

beforeEach(function () {
    $this->binaryTreeBreadthFirstSearch = new BinaryTreeBreadthFirstSearch();
});

it("binary tree breadth-first search", function () {
    $tree = new BinaryNode(
        20,
        left: new BinaryNode(
            10,
            left: new BinaryNode(
                5,
                right: new BinaryNode(7)
            ),
            right: new BinaryNode(15)
        ),
        right: new BinaryNode(
            50,
            left: new BinaryNode(
                30,
                left: new BinaryNode(
                    29,
                    left: new BinaryNode(21)
                ),
                right: new BinaryNode(
                    45,
                    right: new BinaryNode(49)
                )
            )
        )
    );

    expect($this->binaryTreeBreadthFirstSearch->search($tree, 45))->toBe(true);
    expect($this->binaryTreeBreadthFirstSearch->search($tree, 7))->toBe(true);
    expect($this->binaryTreeBreadthFirstSearch->search($tree, 69))->toBe(false);
});
