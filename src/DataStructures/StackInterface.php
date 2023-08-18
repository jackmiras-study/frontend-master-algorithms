<?php

namespace FrontendMaster\Algorithms\DataStructures;

interface StackInterface
{
    public function push(mixed $item): void;
    public function pop(): mixed;
    public function peek(): mixed;
}
