<?php

namespace Tests\Unit\Algorithms;

use FrontendMaster\Algorithms\Algorithms\MazeSolver;
use FrontendMaster\Algorithms\Algorithms\Point;

beforeEach(function () {
    $this->mazeSolver = new MazeSolver();
});

it('perfect scenario', function () {
    $maze = [
        "xxxxxxxxxx x",
        "x        x x",
        "x        x x",
        "x xxxxxxxx x",
        "x          x",
        "x xxxxxxxxxx",
    ];

    $mazeResult = [
        ['x' => 10, 'y' => 0],
        ['x' => 10, 'y' => 1],
        ['x' => 10, 'y' => 2],
        ['x' => 10, 'y' => 3],
        ['x' => 10, 'y' => 4],
        ['x' => 9, 'y' => 4],
        ['x' => 8, 'y' => 4],
        ['x' => 7, 'y' => 4],
        ['x' => 6, 'y' => 4],
        ['x' => 5, 'y' => 4],
        ['x' => 4, 'y' => 4],
        ['x' => 3, 'y' => 4],
        ['x' => 2, 'y' => 4],
        ['x' => 1, 'y' => 4],
        ['x' => 1, 'y' => 5],
    ];

    // Execution
    $result = $this->mazeSolver->solve(
        maze: $maze,
        wall: "x",
        start: new Point(x: 10, y: 0),
        end: new Point(x: 1, y: 5)
    );


    // Assertion
    expect(drawPath($maze, $result))->toBe(drawPath($maze, $mazeResult));
});

it('maze with a room', function () {
    $maze = [
        "xxxxxxxxxx x",
        "x        x x",
        "x   xxxx x x",
        "x   x    x x",
        "x xxxxxxxx x",
        "x          x",
        "x xxxxxxxxxx",
    ];

    $mazeResult = [
        ['x' => 10, 'y' => 0],
        ['x' => 10, 'y' => 1],
        ['x' => 10, 'y' => 2],
        ['x' => 10, 'y' => 3],
        ['x' => 10, 'y' => 4],
        ['x' => 10, 'y' => 5],
        ['x' => 9, 'y' => 5],
        ['x' => 8, 'y' => 5],
        ['x' => 7, 'y' => 5],
        ['x' => 6, 'y' => 5],
        ['x' => 5, 'y' => 5],
        ['x' => 4, 'y' => 5],
        ['x' => 3, 'y' => 5],
        ['x' => 2, 'y' => 5],
        ['x' => 1, 'y' => 5],
        ['x' => 1, 'y' => 6],
    ];

    $result = $this->mazeSolver->solve(
        maze: $maze,
        wall: "x",
        start: new Point(x: 10, y: 0),
        end: new Point(x: 1, y: 6)
    );

    expect(drawPath($maze, $result))->toBe(drawPath($maze, $mazeResult));
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
