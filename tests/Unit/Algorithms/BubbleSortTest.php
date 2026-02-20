<?php

namespace Tests\Unit\Algorithms;

use FrontendMaster\Algorithms\Algorithms\BubbleSort;

beforeEach(function () {
    $this->bubbleSort = new BubbleSort();
});

it('bubble sortt', function () {
    $data = [500, 3, 7, 4, 69, 420, 42];

    $result = $this->bubbleSort->sort($data);

    expect($result)->toBe([3, 4, 7, 42, 69, 420, 500]);
});
