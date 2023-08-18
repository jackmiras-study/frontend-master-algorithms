<?php

namespace Tests\Unit\Algorithms;

use FrontendMaster\Algorithms\Algorithms\BinarySearch;

beforeEach(function () {
    $this->binarySearch = new BinarySearch();
});

it("is needle present on haystack iteratively", function () {
    $needle = 18;
    $haystack = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18];


    $result = $this->binarySearch->search($haystack, $needle);

    expect($result)->toBeTrue();
});

it("is needle present at the middle of the haystack iteratively", function () {
    $needle = 10;
    $haystack = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18];


    $result = $this->binarySearch->search($haystack, $needle);

    expect($result)->toBeTrue();
});

it("is needle not present on the haystack iteratively", function () {
    $needle = 1987;
    $haystack = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18];


    $result = $this->binarySearch->search($haystack, $needle);

    expect($result)->toBeFalse();
});

it("is needle present on haystack recursively", function () {
    $needle = 18;
    $haystack = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18];

    $result = $this->binarySearch->recursiveSearch($haystack, $needle);

    expect($result)->toBeTrue();
});

it("is needle present at the middle of the haystack recursively", function () {
    $needle = 10;
    $haystack = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18];

    $result = $this->binarySearch->recursiveSearch($haystack, $needle);

    expect($result)->toBeTrue();
});

it("is needle not present on the haystack recursively", function () {
    $needle = 1987;
    $haystack = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18];

    $result = $this->binarySearch->recursiveSearch($haystack, $needle);

    expect($result)->toBeFalse();
});
