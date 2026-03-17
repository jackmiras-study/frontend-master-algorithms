<?php

namespace Test\Unit\Algorithms;

use FrontendMaster\Algorithms\Algorithms\BestDealMenu;

beforeEach(function () {
    $this->bestDealMenu = new BestDealMenu();
});

test('Bad Value Combo: individual items are cheaper than the combo', function () {
    $menu = [
        '5.00' => 'Burguer',
        '3.00' => 'Fries',
        '10.00' => 'Burguer,Fries'
    ];

    $order = [
        'Burguer',
        'Fries'
    ];

    $total = $this->bestDealMenu->findMincost($menu, $order);

    expect($total)->toBe(8.00);
});

test('Bad Value Combo 2x Burguers: individual items are cheaper than the combo', function () {
    $menu = [
        '5.00' => 'Burguer',
        '3.00' => 'Fries',
        '10.00' => 'Burguer,Fries'
    ];

    $order = [
        'Burguer',
        'Burguer',
        'Fries'
    ];

    $total = $this->bestDealMenu->findMincost($menu, $order);

    expect($total)->toBe(13.00);
});

test('Impossible Order: returns error code for missing item', function () {
    $menu = [
        '5.00' => 'Burguer',
        '2.00' => 'Fries'
    ];

    $order = [
        'Burguer',
        'Taco'
    ];

    $total = $this->bestDealMenu->findMincost($menu, $order);

    expect($total)->toBe(-1.0);
});

test('The Over-Order: combo is cheaper than ordering individual items', function () {
    $menu = [
        '5.00' => 'Burguer',
        '3.00' => 'Fries',
        '1.00' => 'Soda',
        '7.00' => 'Burguer,Fries,Soda'
    ];

    $order = [
        'Burguer',
        'Fries'
    ];

    $total = $this->bestDealMenu->findMincost($menu, $order);

    expect($total)->toBe(7.00);
});
