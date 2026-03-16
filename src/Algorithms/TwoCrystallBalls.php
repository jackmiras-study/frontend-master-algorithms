<?php

namespace FrontendMaster\Algorithms\Algorithms;

/**
 * Imagine you are standing in front of a building with 10 floors.
 * You have two identical crystal balls. You need to determine the exact floor where a crystal ball will break if dropped.
 *   - If a ball is dropped and doesn't break, you can reuse it.
 *   - If a ball breaks, you cannot use it again.
 *   - You must find the the first floor where it breaks using the minimum number of drops in the worst-case scenario.
 */

class TwoCrystallBalls
{
    // Time complexity of this approach would be O(n) because of the linear search.
    public function solveByHalving(array $breaks): int
    {
        // BinarySearch approach to find the middle of the building.
        $lo = 0;
        $hi = count($breaks);
        $mid = floor($lo + ($hi - $lo) / 2);

        if ($breaks[$mid] === true) {
            // LinearSearch on the left.
            for ($index = 0; $index <= $mid; $index++) {
                if ($breaks[$index] === true) {
                    return $index;
                }
            }
        }

        // LinearSearch on the right.
        for ($index = $mid + 1; $index < $hi; $index++) {
            if ($breaks[$index] === true) {
                return $index;
            }
        }

        // Worst case scenario, a building where the ball never breaks.
        return -1;
    }

    // Time complexity of this approach would be O(sqrt(n)) because even when
    // performing a linear search we are scanning for a sqrt(n) amount of items.
    //   - If the size of the dataset allows for Cubic or Fourth root the
    //     closest the algorithm BigO will get to O(1).
    public function solveByJumping(array $breaks): int
    {
        $breaksCount = count($breaks);
        $jumpAmount = floor(sqrt($breaksCount));

        $jump = $jumpAmount;
        while ($jump <= $breaksCount && $breaks[$jump] === false) {
            $jump = $jump + $jumpAmount;
        }

        for ($index = ($jump - $jumpAmount); $index < $breaksCount; $index++) {
            if ($breaks[$index] === true) {
                return $index;
            }
        }

        return -1;
    }
}
