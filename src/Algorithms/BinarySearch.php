<?php

namespace FrontendMaster\Algorithms\Algorithms;

/**
* When working with binary search, always check if the data set is ordered; if
* it is, there are advantages you can take with that data.a
*
* If the array is ordered, we can jump to the middle of the array and check if
* the value is the value we are searching for; if it is, we return it; if not,
* we check if the value is bigger or smaller than the value we have; if it's
* bigger, it means that the value we are looking for is probably in the second
* half of the array; if not, it means the value is most likely in the first
* half of the array.
*
* If we look closely, we will find that the time complexity of binary search
* is O(LogN) because the algorithm is basically applying the properties of a
* logarithmic operation, and in the worst-case scenario, it will go over all
* the N elements of the dataset.
*
* Another Big O trick: If the input halves at each step, it's likely O(LogN)
* or O(NlogN).
*
* By the way, the solution is described; it sounds like we can apply recursion
* to the search and break down the array in halves until we find the value we
* #  are searching for.
 */

class BinarySearch
{
    function search(array $haystack, int $needle): bool {
        $lo = 0;
        $hi = sizeof($haystack);

        while($lo < $hi) {
            $middle_position = floor($lo + ($hi - $lo) / 2);
            $value = $haystack[$middle_position];

            if ($value === $needle) {
                return true;
            } else if ($needle > $value) {
                // Walk right
                $lo = $middle_position + 1;
            } else {
                // Walk left
                $hi = $middle_position;
            }
        }

        return false;
    }

    function recursiveSearch(array $haystack, int $needle): bool {
        $middle_position = floor(sizeof($haystack) / 2);
        $value = $haystack[$middle_position];

        if ($value === $needle) {
            return true;
        }

        if (sizeof($haystack) > 1) { // Can we slice the array?
            if ($needle > $value) {
                // Slice right
                $sliceRight = array_slice($haystack, $middle_position + 1);
                return $this->recursiveSearch($sliceRight, $needle);
            }

            if ($needle < $value) {
                // Slice left
                $sliceLeft = array_slice($haystack, 0, $middle_position);
                return $this->recursiveSearch($sliceLeft, $needle);
            }
        }

        return false;
    }
}
