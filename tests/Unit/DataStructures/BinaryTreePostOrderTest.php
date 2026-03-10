<?php

namespace Test\Unit\Algorithms;

use FrontendMaster\Algorithms\DataStructures\BinaryNode;
use FrontendMaster\Algorithms\DataStructures\BinaryTreePostOrder;

beforeEach(function () {
    $this->binaryTreePostOrder = new BinaryTreePostOrder();
});

it('performs an post-order traversal', function () {
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

    $result = $this->binaryTreePostOrder->traverse($tree);

    expect($result)->toBe([
        7,
        5,
        15,
        10,
        29,
        45,
        30,
        100,
        50,
        20,
    ]);
});
