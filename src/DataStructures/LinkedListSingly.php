<?php

namespace FrontendMaster\Algorithms\DataStructures;

class Node
{
    public function __construct(public mixed $value = null, public ?Node $next = null)
    {
    }
}

class LinkedListSingly implements LinkedListSinglyInterface
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
            $newNode = new Node(value: $item);
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
            $this->head = new Node(value: $item, next: $this->head);
        }

        $this->length++;
    }

    public function insertAt(int $index, mixed $item): void
    {
        if ($this->head !== null && $index > $this->length - 1) {
            echo ("Index out of bounds");
            return;
        }

        if ($index === 0) {
            $this->prepend($item);
            return;
        }

        $offset = 0;
        $current = $this->head;

        while ($offset < $index - 1) {
            $current = $current->next;
            $offset++;
        }

        $newNode = new Node(value: $item, next: $current->next);
        $current->next = $newNode;

        $this->length++;
    }

    public function remove(mixed $item): mixed
    {
        $removedNode = null;

        if ($this->head->value === $item) {
            $removedNode = $this->head;
            $this->head = $this->head->next;
        } else {
            $current = $this->head;

            while ($current->next) {
                if ($current->next->value === $item) {
                    $removedNode = $current->next;
                    $current->next = $current->next->next;

                    if ($current->next === null) {
                        $this->tail = $current;
                    }

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

        if ($index === 0) {
            $removedNode = $this->head;
            $this->head = $this->head->next;
        } else {
            $offset = 0;
            $current = $this->head;

            while ($offset < $index - 1) {
                $current = $current->next;
                $offset++;
            }

            $removedNode = $current;
            $current->next = $current->next->next;

            if ($current->next === null) {
                $this->tail = $current;
            }
        }

        $this->length--;

        return $removedNode;
    }

    public function get(int $index): mixed
    {
        if ($index === 0) {
            return $this->head;
        }

        if ($index === $this->length - 1) {
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

    public function toArray(): array
    {
        $result = [];
        $current = $this->head;

        while ($current !== null) {
            $result[] = $current->value;
            $current = $current->next;
        }

        return $result;
    }
}
