<?php

namespace FrontendMaster\Algorithms\DataStructures;

interface QueueInterface
{
    public function enque(mixed $item): void;
    public function deque(): mixed;
    public function peek(): mixed;
}
