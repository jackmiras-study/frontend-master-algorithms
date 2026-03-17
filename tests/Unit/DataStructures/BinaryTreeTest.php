<?php

namespace Test\Unit\Algorithms;

use FrontendMaster\Algorithms\DataStructures\BinaryNode;
use FrontendMaster\Algorithms\DataStructures\BinaryTree;

beforeEach(function () {
    // The tree being created has the following structure:
    //      17
    //     /  \
    //   15    50
    //  /  \   /
    // 4   16 25
    //       /  \
    //      18  30

    $this->tree = new BinaryTree(new BinaryNode(
        value: 17,
        left: new BinaryNode(
            value: 15,
            left: new BinaryNode(value: 4),
            right: new BinaryNode(value: 16),
        ),
        right: new BinaryNode(
            value: 50,
            left: new BinaryNode(
                value: 25,
                left: new BinaryNode(value: 18),
                right: new BinaryNode(value: 30),
            ),
        )
    ));
});

it("is needle present on the left side of the tree", function () {
    $needle = 4;

    $result = $this->tree->search($this->tree->root, $needle);

    expect($result)->toBeTrue();
});

it("is needle present on the right side of the tree", function () {
    $needle = 25;

    $result = $this->tree->search($this->tree->root, $needle);

    expect($result)->toBeTrue();
});


it("is needle not present in the tree", function () {
    $needle = 51;

    $result = $this->tree->search($this->tree->root, $needle);

    expect($result)->toBeFalse();
});

it("insert at the right side of the tree", function () {
    $value = 51;

    $this->tree->insert($this->tree->root, $value);

    expect($this->tree->root->right->right->value)->toBe($value);
});


it("insert at the left side of the tree", function () {
    $value = 2;

    $this->tree->insert($this->tree->root, $value);

    expect($this->tree->root->left->left->left->value)->toBe($value);
});

it("delete right", function () {
    $value = 50;

    $this->tree->delete($this->tree->root, $value);

    expect($this->tree->root->right)->toBeNull();
});

it("delete left", function () {
    $value = 15;

    $this->tree->delete($this->tree->root, $value);

    expect($this->tree->root->left)->toBeNull();
});
