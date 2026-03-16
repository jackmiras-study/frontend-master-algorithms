<?php

namespace FrontendMaster\Algorithms\Algorithms;

class QuickSort
{
    private function quickSort(array &$numbers, int $lo, int $hi): void
    {
        if ($lo >= $hi) {
            return;
        }

        $partition = $this->partition($numbers, $lo, $hi);

        $this->quickSort($numbers, $lo, $partition - 1); // Walk Left
        $this->quickSort($numbers, $partition + 1, $hi); // Walk Right
    }

    /**
     * Lomuto Partition Scheme
     * * This method picks the last element as the pivot, places the pivot 
     * element at its correct position in the sorted array, and places 
     * all smaller elements to the left and larger elements to the right.
     */
    private function partition(array &$numbers, int $lo, int $hi): int
    {
        $pivot = $numbers[$hi];
        $pivotIndex = $lo - 1;

        for ($index = $lo; $index < $hi; $index++) {
            if ($numbers[$index] <= $pivot) {
                $pivotIndex++;
                $temp = $numbers[$index];
                $numbers[$index] = $numbers[$pivotIndex];
                $numbers[$pivotIndex] = $temp;
            }
        }

        $pivotIndex++;
        $numbers[$hi] = $numbers[$pivotIndex];
        $numbers[$pivotIndex] = $pivot;

        return $pivotIndex;
    }

    /**
     * Sorts an array in-place using the QuickSort algorithm.
     * * Complexity Analysis:
     * - Best/Average Case: O(n log n) - Occurs when the pivot divides the array evenly.
     * - Worst Case: O(n²) - Occurs when the array is already sorted or reverse-sorted.
     * - Space Complexity: O(log n) - Due to the recursive stack.
     * * @param array &$numbers The array to sort. Passed by reference.
     * @return void
     */
    public function sort(array &$numbers): void
    {
        $this->quickSort($numbers, 0, count($numbers) - 1);
    }
}
