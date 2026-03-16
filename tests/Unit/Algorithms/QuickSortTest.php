<?php

namespace Test\Unit\Algorithms;

use FrontendMaster\Algorithms\Algorithms\QuickSort;

beforeEach(function () {
    $this->quickSort = new QuickSort();
});

it("quick-sort", function () {
    $numbers = [9, 3, 7, 4, 69, 420, 42];

    $this->quickSort->sort($numbers);

    expect($numbers)->toBe([3, 4, 7, 9, 42, 69, 420]);
});
