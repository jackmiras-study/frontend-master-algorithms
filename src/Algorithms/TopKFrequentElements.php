<?php

namespace FrontendMaster\Algorithms\Algorithms;

/**
 * Given an integer array nums and an integer k, return the k most frequent elements. You may return the answer in any order.

 * Example 1:
 * Input: nums = [1,1,1,2,2,3], k = 2
 * Output: [1,2]

 * Example 2:
 * Input: nums = [1], k = 1
 * Output: [1]

 * Example 3:
 * Input: nums = [1,2,1,2,1,2,3,1,3,2], k = 2
 * Output: [1,2]

 * Constraints:
 * 1 <= nums.length <= 105
 * -104 <= nums[i] <= 104
 * k is in the range [1, the number of unique elements in the array].
 * It is guaranteed that the answer is unique.

 * Follow up: Your algorithm's time complexity must be better than O(n log n), where n is the array's size.
 */

class TopKFrequentElements
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k)
    {
        // Build a frequency map
        $frequencyMap = [];
        foreach ($nums as $num) {
            if (array_key_exists($num, $frequencyMap)) {
                $frequencyMap[$num] = $frequencyMap[$num] + 1;
                continue;
            }

            $frequencyMap[$num] = 1;
        }

        // Group by frequency (Bucket sorting)
        $frequencyGroups = [];
        foreach ($frequencyMap as $num => $frequency) {
            if (array_key_exists($frequency, $frequencyGroups)) {
                array_push($frequencyGroups[$frequency], $num);
                continue;
            }

            $frequencyGroups[$frequency] = [$num];
        }

        // Select the $k more frequent items from the groups
        $mostFrequents = [];
        $maxFrequency = count($nums);
        for ($frequency = $maxFrequency; $frequency > 0; $frequency--) {
            if (!isset($frequencyGroups[$frequency])) {
                continue;
            }

            foreach ($frequencyGroups[$frequency] as $num) {
                if (count($mostFrequents) === $k) {
                    break;
                }

                $mostFrequents[] = $num;
            }
        }

        return $mostFrequents;
    }
}
