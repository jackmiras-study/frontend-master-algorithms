<?php

namespace Test\Unit\Algorithms;

use FrontendMaster\Algorithms\DataStructures\BinaryNode;
use FrontendMaster\Algorithms\DataStructures\BinaryTreeInOrder;

beforeEach(function () {
    $this->binaryTreeInOrder = new BinaryTreeInOrder();
});

it('performs an in-order traversal', function () {
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

    $result = $this->binaryTreeInOrder->traverse($tree);

    expect($result)->toBe([
        5,
        7,
        10,
        15,
        20,
        29,
        30,
        45,
        50,
        100,
    ]);
});
