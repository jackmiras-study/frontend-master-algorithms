<?php

namespace FrontendMaster\Algorithms\Algorithms;

use SplQueue;

/**
 * PROBLEM: THE CHEAPEST MENU COMBINATION
 * * * Objective:
 * Find the minimum cost to satisfy a user's order given a menu where 
 * prices are keys and items (or combos) are comma-separated strings.
 * * * Rules:
 * 1. The order is satisfied when requested item quantities are met or exceeded.
 * 2. It may be cheaper to buy a combo with extra items than to buy individual items.
 * 3. If an item in the order is missing from the menu entirely, return -1.0.
 */

/*
 |--------------------------------------------------------------------------
 | TEST CASE 1: Bad Value Combo (Individual Cheaper)
 | Order: Burguer, Fries
 | Menu: Burguer ($5), Fries ($3), Combo ($10)
 | Expected: 8.00 (Algorithm should reject the $10 "value" meal)
 |--------------------------------------------------------------------------
 */

/*
 |--------------------------------------------------------------------------
 | TEST CASE 2: Impossible Order (Missing Item)
 | Order: Burguer, Taco
 | Menu: Burguer, Fries (No Tacos available)
 | Expected: -1.0
 |--------------------------------------------------------------------------
 */

/*
 |--------------------------------------------------------------------------
 | TEST CASE 3: The Over-Order (Extra is Better)
 | Order: Burguer, Fries
 | Menu: Burguer ($5), Fries ($3), Soda ($1), Combo (B+F+S) for $7
 | Expected: 7.00 (Combo is cheaper than B+F individual $8)
 |--------------------------------------------------------------------------
 */

class BestDealMenu
{
    /**
     * @param array $menu  ["price" => "item,item"]
     * @param array $order ["item", "item"]
     * @return float
     */
    function findMinCost(array $menu, array $order)
    {
        $normalizedOrder = [];
        foreach ($order as $item) {
            if (isset($normalizedOrder[$item])) {
                $normalizedOrder[$item]++;
            } else {
                $normalizedOrder[$item] = 1;
            }
        }

        $orderIndex = 0;
        $orderIndexes = [];
        foreach ($order as $item) {
            if (isset($orderIndexes[$item])) {
                continue;
            }

            $orderIndexes[$item] = $orderIndex;
            $orderIndex++;
        }

        $orderTab = array_fill(0, count($normalizedOrder), 0);
        $costKey = implode(",", $orderTab);
        $orderTabCosts[$costKey] = 0;

        $queue = new SplQueue();
        $queue->enqueue($orderTab);

        // Time complexity for this implementation would be O(2^n)|exponential
        // because we loop through the entire menu an N order items 
        // in an N amount order items count.
        //
        // If I have an order of 3 different items: Burgers, Fries, and Soda.
        // If 2 of each is needed, the combinations you could potentially have 
        // in your basket look like this:
        // - Burger count: 0, 1, 2 (Total options = 3)
        // - Fries count: 0, 1, 2 (Total options = 3)
        // - Soda count: 0, 1, 2 (Total options = 3)
        //
        // The total number of possible "states" your basket can be in is 3×3×3=27 (which is 3^3).
        while ($queue->count()) {
            $currentOrderTab = $queue->dequeue();

            foreach ($menu as $price => $itemDesc) {
                $price = (float) $price;
                $items = explode(",", $itemDesc);
                $nextOrderTab = $currentOrderTab;

                foreach ($items as $item) {
                    if (isset($normalizedOrder[$item])) {
                        $index = $orderIndexes[$item];
                        if ($nextOrderTab[$index] < $normalizedOrder[$item]) {
                            $nextOrderTab[$index]++;
                        }
                    }
                }

                if ($currentOrderTab !== $nextOrderTab) {
                    $currentKey = implode(",", $currentOrderTab);
                    $nextKey = implode(",", $nextOrderTab);
                    $newPrice = $orderTabCosts[$currentKey] + $price;

                    if (isset($orderTabCosts[$nextKey]) === false || $newPrice < $orderTabCosts[$nextKey]) {
                        $orderTabCosts[$nextKey] = $newPrice;
                        $queue->enqueue($nextOrderTab);
                    }
                }
            }
        }

        $costKey = implode(",", array_values($normalizedOrder));
        if (isset($orderTabCosts[$costKey])) {
            return $orderTabCosts[$costKey];
        }

        return -1.0;
    }
}
