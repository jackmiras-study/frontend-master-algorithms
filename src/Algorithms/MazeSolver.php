<?php

namespace FrontendMaster\Algorithms\Algorithms;

class Point
{
    public function __construct(public int $x, public int $y) {}
}


class MazeSolver
{
    private $cartesianDirections = [
        [0, 1],
        [1, 0],
        [0, -1],
        [-1, 0],
    ];

    private function walk(
        array $maze,
        string $wall,
        Point $current,
        Point $end,
        array &$path,
        array &$seenPositions
    ): bool {
        // 1. Am I going out of the maze?
        if (
            $current->x < 0 || $current->x >= strlen($maze[0]) ||
            $current->y < 0 || $current->y >= count($maze)
        ) {
            return false;
        }

        // 2. Did I hit a wall?
        if ($maze[$current->y][$current->x] === $wall) {
            return false;
        }

        // 3. Have I been in the place/position?
        if (isset($seenPositions[$current->y][$current->x])) {
            return false;
        }

        // 4. Have I found the exit?
        if ($current->y === $end->y && $current->x === $end->x) {
            array_push($path, $current);
            return true;
        }

        // Pre-recursion
        array_push($path, $current);
        $seenPositions[$current->y][$current->x] = true;

        // Recursion
        for ($index = 0; $index < count($this->cartesianDirections); $index++) {
            [$cartesianDirectionX, $cartesianDirectionY] = $this->cartesianDirections[$index];

            $solved = $this->walk(
                $maze,
                $wall,
                new Point(
                    x: $current->x + $cartesianDirectionX,
                    y: $current->y + $cartesianDirectionY,
                ),
                $end,
                $seenPositions,
            );

            if ($solved === true) {
                return true;
            }
        }

        // Backtrack: All directions failed.
        array_pop($path);

        return false;
    }

    public function solve(array $maze, string $wall, Point $start, Point $end)
    {
        $path = [];
        $seenPositions = [];
        $this->walk($maze, $wall, $start, $end, $path, $seenPositions);

        return $path;
    }
}
