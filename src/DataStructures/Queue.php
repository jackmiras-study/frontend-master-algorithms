<?php

namespace FrontendMaster\Algorithms\DataStructures;

/**
* Queues are one of the most commonly used data structures available, and
* they're nothing more than a specific implementation of a singly linked list.
* The specification of a queue is that the structure is a First In First Out
* (FIFO) singly linked list.
*
* It's not necessary to traverse over the queue to perform an insertion
* operation since all insertions happen at the tail of the queue; for that
* reason, the time complexity of an insert operation is O(1), or constant
* time.
*
* The same is true when retrieving data from it. Since all items retrieved
* come from the head of the queue, there's no traverse, and therefore the time
* complexity to dequeue something is O(1).
*/

class Node
{
    public function __construct(public mixed $value, public ?Node $next = null) {}
}

class Queue implements QueueInterface
{
    public ?Node $head = null;
    public ?Node $tail = null;
    public int $length = 0;

    public function enque(mixed $item): void
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

    public function deque(): mixed
    {
        if ($this->head === null) {
            return null;
        }

        $dequeued = $this->head;
        $this->head = $this->head->next;
        $this->length--;

        return $dequeued;
    }

    public function peek(): mixed
    {
        return $this->head->value ?? null;
    }
}
