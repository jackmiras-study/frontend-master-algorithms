<?php

namespace FrontendMaster\Algorithms\DataStructures;

/**
* Stacks are another popular data structure available, and they're nothing
* more than a specific implementation of a singly linked list. The
* specification of a stack is that the structure is a First In Last Out (FILO)
* singly linked list.
*
* It's not necessary to traverse over the stack to perform an insertion
* operation since all insertions happen at the head of the stack; for that
* reason, the time complexity of an insert operation is O(1), or constant
* time.
*
* The same is true when retrieving data from it. Since all items retrieved
* come from the tail of the queue, there's no traverse, and therefore the time
* complexity to dequeue something is O(1).
*/

class Node
{
    public function __construct(public mixed $value, public ?Node $previous = null) {}
}

class Stack implements StackInterface
{
    public ?Node $head = null;
    public ?Node $tail = null;
    public int $length = 0;

    public function push(mixed $item): void
    {
        if ($this->head === null) {
            $node = new Node(value: $item);
            $this->head = $node;
            $this->tail = $node;
        } else {
            $node = new Node(value: $item, previous:$this->head);
            $this->head = $node;
        }

        $this->length++;
    }

    public function pop(): ?Node
    {
        if ($this->head === null) {
            return null;
        }

        $popped = $this->head;
        $this->head = $this->head->previous;

        $this->length--;

        return $popped;
    }

    public function peek(): mixed
    {
        return $this->head->value ?? null;
    }
}
