<?php

namespace Test\Unit\Algorithms;

use FrontendMaster\Algorithms\DataStructures\BinaryNode;
use FrontendMaster\Algorithms\DataStructures\BinaryTreePreOrder;

beforeEach(function () {
    $this->binaryTreePreOrder = new BinaryTreePreOrder();
});

test('it performs a pre-order traversal', function () {
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

    $result = $this->binaryTreePreOrder->traverse($tree);

    expect($result)->toBe([
        20,
        10,
        5,
        7,
        15,
        50,
        30,
        29,
        45,
        100,
    ]);
});
