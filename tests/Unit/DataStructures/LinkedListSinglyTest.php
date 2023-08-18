<?php

namespace Tests\Unit\DataStructures;

use FrontendMaster\Algorithms\DataStructures\LinkedListSingly as LinkedList;

beforeEach(function () {
    $this->linkedList = new LinkedList();
});

it("append single", function () {
    $this->linkedList->append(1);

    expect($this->linkedList->length)->toBe(1);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(1);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("append multiple", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    expect($this->linkedList->length)->toBe(3);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(2);
    expect($this->linkedList->head->next->next->value)->toBe(3);
    expect($this->linkedList->head->next->next->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(3);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("prepend single", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);

    $this->linkedList->prepend(5);

    expect($this->linkedList->length)->toBe(3);
    expect($this->linkedList->head->value)->toBe(5);
    expect($this->linkedList->head->next->value)->toBe(1);
    expect($this->linkedList->head->next->next->value)->toBe(2);
    expect($this->linkedList->head->next->next->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(2);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("prepend multiple", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);

    $this->linkedList->prepend(5);
    $this->linkedList->prepend(6);

    expect($this->linkedList->length)->toBe(4);
    expect($this->linkedList->head->value)->toBe(6);
    expect($this->linkedList->head->next->value)->toBe(5);
    expect($this->linkedList->head->next->next->value)->toBe(1);
    expect($this->linkedList->head->next->next->next->value)->toBe(2);
    expect($this->linkedList->head->next->next->next->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(2);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("insert at head", function () {
    $this->linkedList->append(99);

    $this->linkedList->insertAt(index: 0, item: 10);

    expect($this->linkedList->length)->toBe(2);
    expect($this->linkedList->head->value)->toBe(10);
    expect($this->linkedList->head->next->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(99);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("insert at middle", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    $this->linkedList->insertAt(index: 1, item: 10);

    expect($this->linkedList->length)->toBe(4);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(10);
    expect($this->linkedList->head->next->next->value)->toBe(2);
    expect($this->linkedList->head->next->next->next->value)->toBe(3);
    expect($this->linkedList->head->next->next->next->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(3);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("insert at tail", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);

    $this->linkedList->insertAt(index: 1, item: 10);

    expect($this->linkedList->length)->toBe(3);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(10);
    expect($this->linkedList->head->next->next->value)->toBe(2);
    expect($this->linkedList->head->next->next->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(2);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("insert at shows index out of bounds error", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);

    ob_start();
    $this->linkedList->insertAt(index:10, item:999);
    $errorMessage = ob_get_clean();

    expect($errorMessage)->toBe("Index out of bounds");
});

it("remove head", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    $this->linkedList->remove(1);

    expect($this->linkedList->length)->toBe(2);
    expect($this->linkedList->head->value)->toBe(2);
    expect($this->linkedList->head->next->value)->toBe(3);
    expect($this->linkedList->head->next->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(3);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("remove middle", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    $this->linkedList->remove(2);

    expect($this->linkedList->length)->toBe(2);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(3);
    expect($this->linkedList->head->next->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(3);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("remove tail", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    $this->linkedList->remove(3);

    expect($this->linkedList->length)->toBe(2);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(2);
    expect($this->linkedList->head->next->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(2);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("remove at head", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    $this->linkedList->removeAt(index: 0);

    expect($this->linkedList->length)->toBe(2);
    expect($this->linkedList->head->value)->toBe(2);
    expect($this->linkedList->head->next->value)->toBe(3);
    expect($this->linkedList->head->next->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(3);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("remove at middle", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    $this->linkedList->removeAt(index: 1);

    expect($this->linkedList->length)->toBe(2);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(3);
    expect($this->linkedList->head->next->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(3);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("remove at tail", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    $this->linkedList->removeAt(2);

    expect($this->linkedList->length)->toBe(2);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(2);
    expect($this->linkedList->head->next->next)->toBe(null);
    expect($this->linkedList->tail->value)->toBe(2);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("get head", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    $result = $this->linkedList->get(index: 0);

    expect($result->value)->toBe(1);
});

it("get middle", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    $result = $this->linkedList->get(1);

    expect($result->value)->toBe(2);
});

it("get tail", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    $result = $this->linkedList->get(2);

    expect($result->value)->toBe(3);
});

it("transform to array correctly when populating with append", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    $result = $this->linkedList->toArray();

    expect($result)->toBe([1, 2, 3]);
});

it("transform to array correctly when populating with prepend", function () {
    $this->linkedList->prepend(1);
    $this->linkedList->prepend(2);
    $this->linkedList->prepend(3);

    $result = $this->linkedList->toArray();

    expect($result)->toBe([3, 2, 1]);
});
