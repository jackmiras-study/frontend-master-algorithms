<?php

namespace FrontendMaster\Algorithms\DataStructures;

interface LinkedListDoublyInterface
{
    public function append(mixed $item): void;
    public function prepend(mixed $item): void;
    public function insertAt(int $index, mixed $item): void;
    public function remove(mixed $item): mixed;
    public function removeAt(int $index): mixed;
    public function get(int $index): mixed;
    public function toArray(bool $reversed = false): array;
}
