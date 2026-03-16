<?php

namespace Tests\Unit\Algorithms;

use FrontendMaster\Algorithms\Algorithms\TopKFrequentElements;

beforeEach(function () {
    $this->solution = new TopKFrequentElements();
});

it('handles a single element', function () {
    $result = $this->solution->topKFrequent([5], 1);

    expect([5])->toBe($result);
});

it('handles all unique elements', function () {
    $nums = [1, 2, 3, 4, 5];
    $k = 3;

    $result = $this->solution->topKFrequent($nums, $k);

    expect(count($result))->toBe(3);
});


it('returns the most frequent element when k is 1', function () {
    $nums = [7, 7, 7, 7, 1, 2, 3];
    $result = $this->solution->topKFrequent($nums, 1);

    expect([7])->toBe($result);
});

it('handles steep frequency drop-offs', function () {
    $nums = [1, 1, 1, 1, 2, 2, 3];
    $result = $this->solution->topKFrequent($nums, 2);

    expect([1, 2])->toBe($result);
});
