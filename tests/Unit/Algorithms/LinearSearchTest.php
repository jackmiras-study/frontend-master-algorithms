<?php

namespace Tests\Unit\Algorithms;

use FrontendMaster\Algorithms\Algorithms\LinearSearch;

beforeEach(function () {
    $this->linearSearch = new LinearSearch();
});

it("is needle present on haystack iteratively", function () {
    $needle = 18;
    $haystack = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18];

    $result = $this->linearSearch->search($haystack, $needle);

    expect($result)->toBeTrue();
});

it("is needle present at the middle of the haystack iteratively", function () {
    $needle = 10;
    $haystack = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18];

    $result = $this->linearSearch->search($haystack, $needle);

    expect($result)->toBeTrue();
});

it("is needle not present on the haystack iteratively", function () {
    $needle = 1987;
    $haystack = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18];

    $result = $this->linearSearch->search($haystack, $needle);

    expect($result)->toBeFalse();
});
