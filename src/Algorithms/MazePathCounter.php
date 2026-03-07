<?php

namespace FrontendMaster\Algorithms\Algorithms;

class Point
{
    public function __construct(public int $x, public int $y) {}
}

class MazePathCounter
{
    private $cartesianDirections = [
        [0, 1],
        [1, 0],
        [0, -1],
        [-1, 0],
    ];

    private function count(
        array $maze,
        string $wall,
        Point $start,
        Point $end,
        array &$seenPositions
    ): int {
        // 1. Am I going out of the maze?
        if (
            $start->x < 0 || $start->x >= strlen($maze[0]) ||
            $start->y < 0 || $start->y >= count($maze)
        ) {
            return 0;
        }

        // 2. Did I hit a wall?
        if ($maze[$start->y][$start->x] === $wall) {
            return 0;
        }

        // 2. Have I been in this place/position?
        if (isset($seenPositions[$start->y][$start->x])) {
            return 0;
        }

        // 2. Have I found the exit?
        if ($start->y === $end->y && $start->x === $end->x) {
            return 1;
        }

        // Pre-recursion
        $totalPathsFound = 0;
        $seenPositions[$start->y][$start->x] = true;

        // Recursion
        for ($index = 0; $index < count($this->cartesianDirections); $index++) {
            [$cartesianDirectionX, $cartesianDirectionY] = $this->cartesianDirections[$index];
            $totalPathsFound += $this->count(
                $maze,
                $wall,
                new Point(
                    x: $start->x + $cartesianDirectionX,
                    y: $start->y + $cartesianDirectionY,
                ),
                $end,
                $seenPositions,
            );
        }

        // Backtrack: All directions failed.
        unset($seenPositions[$start->y][$start->x]);

        return $totalPathsFound;
    }

    public function solve(array $maze, string $wall, Point $start, Point $end)
    {
        $seenPositions = [];
        return $this->count($maze, $wall, $start, $end, $seenPositions);
    }
}
