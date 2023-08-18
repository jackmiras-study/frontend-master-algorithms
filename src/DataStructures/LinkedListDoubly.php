<?php

namespace FrontendMaster\Algorithms\DataStructures;

class Node
{
    public function __construct(
        public mixed $value = null,
        public ?Node $next = null,
        public ?Node $previous = null
    ) {
    }
}

class LinkedListDoubly implements LinkedListDoublyInterface
{
    public ?Node $head = null;
    public ?Node $tail = null;
    public int $length = 0;

    public function append(mixed $item): void
    {
        if ($this->head === null) {
            $newNode = new Node(value: $item);
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $newNode = new Node(value: $item, previous:$this->tail);
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }

        $this->length++;
    }

    public function prepend(mixed $item): void
    {
        if ($this->head === null) {
            $newNode = new Node(value: $item);
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $newNode = new Node(value: $item, next: $this->head);
            $this->head->previous = $newNode;
            $this->head = $newNode;
        }

        $this->length++;
    }

    public function insertAt(int $index, mixed $item): void
    {
        if ($index > $this->length - 1) {
            echo("Index out of bounds");
            return;
        }

        if ($index === 0) {
            $this->prepend($item);
            return;
        } 

        $offset = 0;
        $current = $this->head;

        while ($offset < $index) {
            $current = $current->next;
            $offset++;
        }

        $newNode = new Node(value: $item, next: $current, previous: $current->previous);
        $current->previous->next = $newNode;
        $current->previous = $newNode;

        $this->length++;
    }

    public function remove(mixed $item): mixed
    {
        $removedNode = null;

        if ($this->head->value === $item) {
            $removedNode = $this->head;
            $this->head = $this->head->next;
            $this->head->previous = null;
        } 
        elseif ($this->tail->value === $item) {
            $removedNode = $this->tail;
            $this->tail = $this->tail->previous;
            $this->tail->next = null;
        } else {
            $current = $this->head;

            while ($current->next) {
                if ($current->next->value === $item) {
                    $removedNode = $current->next;
                    $current->next = $current->next->next;
                    $current->next->previous = $current;
                    break;
                }

                $current = $current->next;
            }
        }

        $this->length--;
        return $removedNode;
    }

    public function removeAt(int $index): mixed
    {
        $removedNode = null;

        if ($index === 0) { // Remove at head
            $removedNode = $this->head;
            return $this->remove($this->head->value);
        }

        if ($index === $this->length - 1) { // Remove at tail
            $removedNode = $this->tail;
            return $this->remove($this->tail->value);

        }

        // Remove in the middle
        $offset = 0;
        $current = $this->head;

        while ($offset < $index - 1) {
            $current = $current->next;
            $offset++;
        }

        $removedNode = $current->next;
        $current->next = $current->next->next;
        $current->next->previous = $current;

        $this->length--;
        return $removedNode;
    }

    public function get(int $index): mixed
    {
        if ($index === 0) {
            return $this->head;
        }

        if ($index == $this->length - 1) {
            return $this->tail;
        }

        $offset = 0;
        $current = $this->head;

        while ($offset < $index) {
            $current = $current->next;
            $offset++;
        }

        return $current;
    }

    public function toArray(bool $reversed = false): array
    {
        $values = [];
        $current = $reversed ? $this->tail : $this->head;

        while ($current) {
            $values[] = $current->value;
            $current = $reversed ? $current->previous : $current->next;
        }

        return $values;
    }
}
