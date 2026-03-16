<?php

namespace Tests\Unit\Algorithms;

use FrontendMaster\Algorithms\Algorithms\MazeMultiPaths;
use FrontendMaster\Algorithms\Algorithms\Point;

beforeEach(function () {
    $this->mazeMultiPaths = new MazeMultiPaths();
});

it('counts all possible paths in a 3x3 warehouse maze', function () {
    $maze = [
        "   ",
        " x ",
        "   ",
    ];

    $mazeResults = [
        // Path 1: Down the left side, then right along the bottom
        [
            ['x' => 0, 'y' => 0],
            ['x' => 0, 'y' => 1],
            ['x' => 0, 'y' => 2],
            ['x' => 1, 'y' => 2],
            ['x' => 2, 'y' => 2]
        ],
        // Path 2: Right along the top, then down the right side
        [
            ['x' => 0, 'y' => 0],
            ['x' => 1, 'y' => 0],
            ['x' => 2, 'y' => 0],
            ['x' => 2, 'y' => 1],
            ['x' => 2, 'y' => 2]
        ]
    ];

    $paths = $this->mazeMultiPaths->solve(
        maze: $maze,
        wall: "x",
        start: new Point(0, 0),
        end: new Point(2, 2),
    );

    foreach ($paths as $index => $path) {
        $visual = drawPath($maze, $path);

        // This will print the maze to your terminal during the test run
        // echo "\nMaze 3x3, path {$index} visualization:\n";
        // echo implode("\n", $visual) . "\n";

        expect($visual)->toBe(drawPath($maze, $mazeResults[$index]));
    }
});

it('counts all possible paths in a 6x6 warehouse maze', function () {
    $maze = [
        "      ",
        " xxxx ",
        " x  x ",
        " x  x ",
        "      ",
        "xxxxx ",
    ];

    $mazeResults = [
        // Path 0
        [
            ['x' => 0, 'y' => 0],
            ['x' => 0, 'y' => 1],
            ['x' => 0, 'y' => 2],
            ['x' => 0, 'y' => 3],
            ['x' => 0, 'y' => 4],
            ['x' => 1, 'y' => 4],
            ['x' => 2, 'y' => 4],
            ['x' => 3, 'y' => 4],
            ['x' => 4, 'y' => 4],
            ['x' => 5, 'y' => 4],
            ['x' => 5, 'y' => 5]
        ],
        // Path 1
        [
            ['x' => 0, 'y' => 0],
            ['x' => 0, 'y' => 1],
            ['x' => 0, 'y' => 2],
            ['x' => 0, 'y' => 3],
            ['x' => 0, 'y' => 4],
            ['x' => 1, 'y' => 4],
            ['x' => 2, 'y' => 4],
            ['x' => 2, 'y' => 3],
            ['x' => 3, 'y' => 3],
            ['x' => 3, 'y' => 4],
            ['x' => 4, 'y' => 4],
            ['x' => 5, 'y' => 4],
            ['x' => 5, 'y' => 5]
        ],
        // Path 2
        [
            ['x' => 0, 'y' => 0],
            ['x' => 0, 'y' => 1],
            ['x' => 0, 'y' => 2],
            ['x' => 0, 'y' => 3],
            ['x' => 0, 'y' => 4],
            ['x' => 1, 'y' => 4],
            ['x' => 2, 'y' => 4],
            ['x' => 2, 'y' => 3],
            ['x' => 2, 'y' => 2],
            ['x' => 3, 'y' => 2],
            ['x' => 3, 'y' => 3],
            ['x' => 3, 'y' => 4],
            ['x' => 4, 'y' => 4],
            ['x' => 5, 'y' => 4],
            ['x' => 5, 'y' => 5]
        ],
        // Path 3
        [
            ['x' => 0, 'y' => 0],
            ['x' => 1, 'y' => 0],
            ['x' => 2, 'y' => 0],
            ['x' => 3, 'y' => 0],
            ['x' => 4, 'y' => 0],
            ['x' => 5, 'y' => 0],
            ['x' => 5, 'y' => 1],
            ['x' => 5, 'y' => 2],
            ['x' => 5, 'y' => 3],
            ['x' => 5, 'y' => 4],
            ['x' => 5, 'y' => 5]
        ]
    ];

    $paths = $this->mazeMultiPaths->solve(
        maze: $maze,
        wall: "x",
        start: new Point(0, 0),
        end: new Point(5, 5)
    );

    expect(count($paths))->toBe(count($mazeResults));

    foreach ($paths as $index => $path) {
        $visual = drawPath($maze, $path);

        // This will print the maze to your terminal during the test run
        // echo "\nMaze 6x6, path {$index} visualization:\n";
        // echo implode("\n", $visual) . "\n";

        expect($visual)->toBe(drawPath($maze, $mazeResults[$index]));
    }
});

/**
 * Helper function to visualize the path on the maze
 */
function drawPath(array $data, array $path): array
{
    $grid = array_map(fn($row) => str_split($row), $data);

    foreach ($path as $p) {
        // Handle both Point objects and associative arrays
        $x = is_object($p) ? $p->x : $p['x'];
        $y = is_object($p) ? $p->y : $p['y'];

        if (isset($grid[$y][$x])) {
            $grid[$y][$x] = '*';
        }
    }

    return array_map(fn($row) => implode('', $row), $grid);
}
