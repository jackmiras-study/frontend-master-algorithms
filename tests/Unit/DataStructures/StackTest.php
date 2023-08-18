<?php

namespace Tests\Unit\DataStructures;

use FrontendMaster\Algorithms\DataStructures\Stack;

beforeEach(function () {
    $this->stack = new Stack();
});

it("push", function () {
    $this->stack->push(1);
    $this->stack->push(2);

    expect($this->stack->length)->toBe(2);
    expect($this->stack->head->value)->toBe(2);
    expect($this->stack->head->previous->value)->toBe(1);
    expect($this->stack->head->previous->previous)->toBe(null);
    expect($this->stack->tail->value)->toBe(1);
    expect($this->stack->tail->previous)->toBe(null);
});


it("pop", function () {
    $this->stack->push(1);
    $this->stack->push(2);

    $node = $this->stack->pop();

    expect($this->stack->length)->toBe(1);
    expect($node->value)->toBe(2);
});

it("pop length dont go negative", function () {
    $this->stack->pop();

    expect($this->stack->length)->toBe(0);
});

it("peek return valid number", function () {
    $this->stack->push(1);
    $this->stack->push(2);
    $this->stack->push(3);

    $value = $this->stack->peek();

    expect($value)->toBe(3);
});

it("peek return null when stack is empty", function () {
    $value = $this->stack->peek();

    expect($value)->toBe(null);
});
