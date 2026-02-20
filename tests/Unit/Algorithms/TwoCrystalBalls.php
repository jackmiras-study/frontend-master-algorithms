<?php

namespace Tests\Unit\Algorithms;

use FrontendMaster\Algorithms\Algorithms\TwoCrystallBalls;

beforeEach(function () {
    $this->solution = new TwoCrystallBalls();
});

it('identifies the breaking floor using the midpoint split strategy', function () {
    $breakingFloor = rand(0, 9); // Randomly pick the "breaking floor" between 0 and 9
    $building = array_fill(0, 10, false); // Create a 10-story building (array of 10)

    // Every floor from the breaking floor onwards is marked 'true' (breaks)
    for ($i = $breakingFloor; $i < 10; ++$i) {
        $building[$i] = true;
    }

    expect($this->solution->solveByHalving($building))->toBe($breakingFloor);
});

it('returns -1 using the midpoint split strategy when the ball never breaks', function () {
    $safeBuilding = array_fill(0, 10, false);

    expect($this->solution->solveByHalving($safeBuilding))->toBe(-1);
});

it('identifies the breaking floor using the jump strategy', function () {
    $breakingFloor = rand(0, 9); // Randomly pick the "breaking floor" between 0 and 9
    $building = array_fill(0, 10, false); // Create a 10-story building (array of 10)

    // Every floor from the breaking floor onwards is marked 'true' (breaks)
    for ($i = $breakingFloor; $i < 10; ++$i) {
        $building[$i] = true;
    }

    expect($this->solution->solveByJumping($building))->toBe($breakingFloor);
});

it('returns -1 using the jump strategy when the ball never breaks', function () {
    $safeBuilding = array_fill(0, 10, false);

    expect($this->solution->solveByJumping($safeBuilding))->toBe(-1);
});
