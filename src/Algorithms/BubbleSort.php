<?php

namespace FrontendMaster\Algorithms\Algorithms;

class BubbleSort
{
    // Complexity time for this algorithm is O(n^2) as the inner loop will at
    // least once go through the entire $items array which characterizes two
    // nested loops running the entirety of the $items array at least once.
    public function sort(array $items): array
    {
        $itemsCount = count($items) - 1;

        for ($endIndex = $itemsCount; $endIndex > 0; $endIndex--) {
            for ($index = 0; $index < $endIndex; $index++) {
                if ($items[$index] > $items[$index + 1]) {
                    $swap = $items[$index];
                    $items[$index] = $items[$index + 1];
                    $items[$index + 1] = $swap;
                }
            }
        }

        return $items;
    }
}
