<?php

namespace Tests\Unit\DataStructures;

use FrontendMaster\Algorithms\DataStructures\LinkedListDoubly as LinkedList;

beforeEach(function () {
    $this->linkedList = new LinkedList();
});

it("append single", function () {
    // Act
    $this->linkedList->append(1);

    // Assert
    expect($this->linkedList->length)->toBe(1);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next)->toBe(null);

    expect($this->linkedList->tail->value)->toBe(1);
    expect($this->linkedList->tail->previous)->toBe(null);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("append multiple", function () {
    // Act
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    // Assert
    expect($this->linkedList->length)->toBe(3);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(2);

    expect($this->linkedList->head->next->previous->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(2);
    expect($this->linkedList->head->next->next->value)->toBe(3);

    expect($this->linkedList->head->next->next->previous->value)->toBe(2);
    expect($this->linkedList->head->next->next->value)->toBe(3);
    expect($this->linkedList->head->next->next->next)->toBe(null);

    expect($this->linkedList->tail->previous->value)->toBe(2);
    expect($this->linkedList->tail->value)->toBe(3);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("prepend single", function () {
    // Arrange
    $this->linkedList->append(1);
    $this->linkedList->append(2);

    // Act
    $this->linkedList->prepend(5);

    // Assert
    expect($this->linkedList->length)->toBe(3);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(5);
    expect($this->linkedList->head->next->value)->toBe(1);

    expect($this->linkedList->head->next->previous->value)->toBe(5);
    expect($this->linkedList->head->next->value)->toBe(1);
    expect($this->linkedList->head->next->next->value)->toBe(2);

    expect($this->linkedList->head->next->next->previous->value)->toBe(1);
    expect($this->linkedList->head->next->next->value)->toBe(2);
    expect($this->linkedList->head->next->next->next)->toBe(null);

    expect($this->linkedList->tail->previous->value)->toBe(1);
    expect($this->linkedList->tail->value)->toBe(2);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("prepend multiple", function () {
    // Arrange
    $this->linkedList->append(1);
    $this->linkedList->append(2);

    // Act
    $this->linkedList->prepend(5);
    $this->linkedList->prepend(6);

    // Assert
    expect($this->linkedList->length)->toBe(4);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(6);
    expect($this->linkedList->head->next->value)->toBe(5);

    expect($this->linkedList->head->next->previous->value)->toBe(6);
    expect($this->linkedList->head->next->value)->toBe(5);
    expect($this->linkedList->head->next->next->value)->toBe(1);

    expect($this->linkedList->head->next->next->previous->value)->toBe(5);
    expect($this->linkedList->head->next->next->value)->toBe(1);
    expect($this->linkedList->head->next->next->next->value)->toBe(2);

    expect($this->linkedList->head->next->next->next->previous->value)->toBe(1);
    expect($this->linkedList->head->next->next->next->value)->toBe(2);
    expect($this->linkedList->head->next->next->next->next)->toBe(null);

    expect($this->linkedList->tail->previous->value)->toBe(1);
    expect($this->linkedList->tail->value)->toBe(2);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("insert at head", function () {
    // Arrange
    $this->linkedList->append(99);

    // Act
    $this->linkedList->insertAt(index: 0, item: 10);

    // Assert
    expect($this->linkedList->length)->toBe(2);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(10);
    expect($this->linkedList->head->next->value)->toBe(99);

    expect($this->linkedList->head->next->previous->value)->toBe(10);
    expect($this->linkedList->head->next->value)->toBe(99);
    expect($this->linkedList->head->next->next)->toBe(null);

    expect($this->linkedList->tail->previous->value)->toBe(10);
    expect($this->linkedList->tail->value)->toBe(99);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("insert at middle", function () {
    // Arrange
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    // Act
    $this->linkedList->insertAt(index: 1, item: 10);

    // Assert
    expect($this->linkedList->length)->toBe(4);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(10);

    expect($this->linkedList->head->next->previous->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(10);
    expect($this->linkedList->head->next->next->value)->toBe(2);

    expect($this->linkedList->head->next->next->next->previous->value)->toBe(2);
    expect($this->linkedList->head->next->next->next->value)->toBe(3);
    expect($this->linkedList->head->next->next->next->next)->toBe(null);

    expect($this->linkedList->tail->previous->value)->toBe(2);
    expect($this->linkedList->tail->value)->toBe(3);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("insert at tail", function () {
    // Arrange
    $this->linkedList->append(1);
    $this->linkedList->append(2);

    // Act
    $this->linkedList->insertAt(index: 1, item: 10);

    // Assert
    expect($this->linkedList->length)->toBe(3);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(10);

    expect($this->linkedList->head->next->previous->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(10);
    expect($this->linkedList->head->next->next->next)->toBe(null);

    expect($this->linkedList->head->next->next->previous->value)->toBe(10);
    expect($this->linkedList->head->next->next->value)->toBe(2);
    expect($this->linkedList->head->next->next->next)->toBe(null);

    expect($this->linkedList->tail->previous->value)->toBe(10);
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
    // Arrange
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    // Act
    $this->linkedList->remove(1);

    // Assert
    expect($this->linkedList->length)->toBe(2);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(2);
    expect($this->linkedList->head->next->value)->toBe(3);

    expect($this->linkedList->head->next->previous->value)->toBe(2);
    expect($this->linkedList->head->next->value)->toBe(3);
    expect($this->linkedList->head->next->next)->toBe(null);

    expect($this->linkedList->tail->previous->value)->toBe(2);
    expect($this->linkedList->tail->value)->toBe(3);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("remove middle", function () {
    // Arrange
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    // Act
    $this->linkedList->remove(2);

    // Assert
    expect($this->linkedList->length)->toBe(2);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(3);

    expect($this->linkedList->head->next->previous->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(3);
    expect($this->linkedList->head->next->next)->toBe(null);

    expect($this->linkedList->tail->previous->value)->toBe(1);
    expect($this->linkedList->tail->value)->toBe(3);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("remove tail", function () {
    // Arrange
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    // Act
    $this->linkedList->remove(3);

    // Assert
    expect($this->linkedList->length)->toBe(2);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(2);

    expect($this->linkedList->head->next->previous->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(2);
    expect($this->linkedList->head->next->next)->toBe(null);

    expect($this->linkedList->tail->previous->value)->toBe(1);
    expect($this->linkedList->tail->value)->toBe(2);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("remove at head", function () {
    // Arrange
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    // Act
    $this->linkedList->removeAt(index: 0);

    // Assert
    expect($this->linkedList->length)->toBe(2);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(2);
    expect($this->linkedList->head->next->value)->toBe(3);

    expect($this->linkedList->head->next->previous->value)->toBe(2);
    expect($this->linkedList->head->next->value)->toBe(3);
    expect($this->linkedList->head->next->next)->toBe(null);

    expect($this->linkedList->tail->previous->value)->toBe(2);
    expect($this->linkedList->tail->value)->toBe(3);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("remove at middle", function () {
    // Arrange
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    // Act
    $this->linkedList->removeAt(index: 1);

    // Assert
    expect($this->linkedList->length)->toBe(2);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(3);

    expect($this->linkedList->head->next->previous->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(3);
    expect($this->linkedList->head->next->next)->toBe(null);

    expect($this->linkedList->tail->previous->value)->toBe(1);
    expect($this->linkedList->tail->value)->toBe(3);
    expect($this->linkedList->tail->next)->toBe(null);
});

it("remove at tail", function () {
    // Arrange
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    // Act
    $this->linkedList->removeAt(2);

    // Assert
    expect($this->linkedList->length)->toBe(2);

    expect($this->linkedList->head->previous)->toBe(null);
    expect($this->linkedList->head->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(2);

    expect($this->linkedList->head->next->previous->value)->toBe(1);
    expect($this->linkedList->head->next->value)->toBe(2);
    expect($this->linkedList->head->next->next)->toBe(null);

    expect($this->linkedList->tail->previous->value)->toBe(1);
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

it("transform to reversed array correctly when populating with append", function () {
    $this->linkedList->append(1);
    $this->linkedList->append(2);
    $this->linkedList->append(3);

    $result = $this->linkedList->toArray(reversed: true);

    expect($result)->toBe([3, 2, 1]);
});

it("transform to array correctly when populating with prepend", function () {
    $this->linkedList->prepend(1);
    $this->linkedList->prepend(2);
    $this->linkedList->prepend(3);

    $result = $this->linkedList->toArray();

    expect($result)->toBe([3, 2, 1]);
});

it("transform to reversed array correctly when populating with prepend", function () {
    $this->linkedList->prepend(1);
    $this->linkedList->prepend(2);
    $this->linkedList->prepend(3);

    $result = $this->linkedList->toArray(reversed: true);

    expect($result)->toBe([1, 2, 3]);
});
