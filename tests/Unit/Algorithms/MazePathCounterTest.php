<?php

namespace Tests\Unit\Algorithms;

use FrontendMaster\Algorithms\Algorithms\MazePathCounter;
use FrontendMaster\Algorithms\Algorithms\Point;

beforeEach(function () {
    $this->mazePathCounter = new MazePathCounter();
});

it('counts all possible paths in a maze', function () {
    $maze = [
        "   ",
        " x ",
        "   ",
    ];

    $pathCount = $this->mazePathCounter->solve(
        maze: $maze,
        wall: "x",
        start: new Point(0, 0),
        end: new Point(2, 2),
    );

    expect($pathCount)->toBe(2);
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

    $pathCount = $this->mazePathCounter->solve(
        maze: $maze,
        wall: "x",
        start: new Point(0, 0),
        end: new Point(5, 5)
    );

    expect($pathCount)->toBe(4);
});
