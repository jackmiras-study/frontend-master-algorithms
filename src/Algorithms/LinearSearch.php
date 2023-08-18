<?php

namespace FrontendMaster\Algorithms\Algorithms;

/**
* A linear search will go index by index, searching for a specific value. If
* we look closely, we will find that the time complexity of linear search is
* O(N), or constant time. The reason is that as the size of the input grows,
* the time to go over the entire input will equally or constantly grow.
*
* In the worst-case scenario, where we have an array of sizes 0 to N, if the
* value we are searching for is at the end of the array, at position N, it
* means that it took N units of time to find the value. This is the reason we
* say that the time grows equally or constantly as the size of the array
* grows.
*
* Usage example: Functions like index_of() will often implement linear search.
*/

class LinearSearch
{
    public function search(array $haystack, int $needle): bool
    {
        foreach ($haystack as $value) {
            if ($value == $needle) {
                return true;
            }
        }

        // for ($index = 0; $index < sizeof($haystack); $index++) {
        //     if ($haystack[$index] === $needle) {
        //         return true;
        //     }
        // }

        return false;
    }
}
