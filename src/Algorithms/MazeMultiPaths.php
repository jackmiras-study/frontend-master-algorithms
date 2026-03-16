<?php

namespace FrontendMaster\Algorithms\Algorithms;

class Point
{
    public function __construct(public int $x, public int $y) {}
}

class MazeMultiPaths
{
    private array $cartesianDirections = [
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
        array &$paths,
        array &$seenPositions
    ): void {
        // 1. Am I going out of the maze?
        if (
            $current->x < 0 || $current->x >= strlen($maze[0]) ||
            $current->y < 0 || $current->y >= count($maze)
        ) {
            return;
        }

        // 2. Have I hit a wall?
        if ($maze[$current->y][$current->x] === $wall) {
            return;
        }

        // 2. Have I been in this place/position?
        if (isset($seenPositions[$current->y][$current->x])) {
            return;
        }

        array_push($path, ['x' => $current->x, 'y' => $current->y]);
        $seenPositions[$current->y][$current->x] = true;

        // 3. Have I found the exit?
        if ($current->y === $end->y && $current->x === $end->x) {
            array_push($paths, $path);
        }

        // Otherwise recurse
        for ($index = 0; $index < count($this->cartesianDirections); $index++) {
            [$cdX, $cdY] = $this->cartesianDirections[$index];

            $this->walk(
                $maze,
                $wall,
                new Point(
                    x: $current->x + $cdX,
                    y: $current->y + $cdY
                ),
                $end,
                $path,
                $paths,
                $seenPositions,
            );
        }

        // Backtrack: All directions failed.
        array_pop($path);
        unset($seenPositions[$current->y][$current->x]);
    }

    public function solve(array $maze, string $wall, Point $start, Point $end)
    {
        $path = [];
        $paths = [];
        $seenPositions = [];
        $this->walk($maze, $wall, $start, $end, $path, $paths, $seenPositions);

        return $paths;
    }
}
