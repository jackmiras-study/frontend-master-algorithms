<?php

namespace Tests\Unit\DataStructures;

use FrontendMaster\Algorithms\DataStructures\Queue;

beforeEach(function () {
    $this->queue = new Queue();
});

it("enque", function () {
    $this->queue->enque(1);
    $this->queue->enque(2);

    expect($this->queue->length)->toBe(2);
    expect($this->queue->head->value)->toBe(1);
    expect($this->queue->head->next->value)->toBe(2);
    expect($this->queue->head->next->next)->toBe(null);
    expect($this->queue->tail->value)->toBe(2);
    expect($this->queue->tail->next)->toBe(null);
});

it("deque", function () {
    $this->queue->enque(1);
    $this->queue->enque(2);

    $firstNode = $this->queue->deque();
    $secondNode = $this->queue->deque();

    expect($this->queue->length)->toBe(0);
    expect($firstNode->value)->toBe(1);
    expect($secondNode->value)->toBe(2);
});

it("deque length dont got negative", function () {
    $this->queue->deque();
    $this->queue->deque();

    expect($this->queue->length)->toBe(0);
});

it("peek return valid value", function () {
    $this->queue->enque(1);
    $this->queue->enque(2);
    $this->queue->enque(3);

    $value = $this->queue->peek();

    expect($value)->toBe(1);
});

it("peek return null when queue is empty", function () {
    $value = $this->queue->peek();

    expect($value)->toBe(null);
});
