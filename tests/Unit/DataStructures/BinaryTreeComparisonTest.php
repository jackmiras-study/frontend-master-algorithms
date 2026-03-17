<?php

namespace Test\Unit\DataStructures;

use FrontendMaster\Algorithms\DataStructures\BinaryNode;
use FrontendMaster\Algorithms\DataStructures\BinaryTreeComparison;

beforeEach(function () {
    $this->binaryTreeComparison = new BinaryTreeComparison();
});

it("compares binary trees", function () {
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
                left: new BinaryNode(29),
                right: new BinaryNode(45)
            ),
            right: new BinaryNode(100)
        )
    );

    $tree2 = new BinaryNode(
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

    expect($this->binaryTreeComparison->compare($tree, $tree))->toBeTrue();
    expect($this->binaryTreeComparison->compare($tree, $tree2))->toBeFalse();
});
