<?php

use \App\Libs\Game;

test('Love All', function () {
    $g = new Game(0, 0);
    $this->assertEquals($g->getDescription(), 'Love All');
});

test('15-0', function () {
    $g = new Game(1, 0);
    $this->assertEquals($g->getDescription(), 'Fifteen : Love');
});

test('30-0', function () {
    $g = new Game(2, 0);
    $this->assertEquals($g->getDescription(), 'Thirty : Love');
});

test('40-0', function () {
    $g = new Game(3, 0);
    $this->assertEquals($g->getDescription(), 'Forty : Love');
});

test('Left Wins', function () {
    $g = new Game(4, 0);
    $this->assertEquals($g->getDescription(), 'Left Wins!');
});

test('15 All', function () {
    $g = new Game(1, 1);
    $this->assertEquals($g->getDescription(), 'Fifteen All');
});

test('40 15', function () {
    $g = new Game(3, 1);
    $this->assertEquals($g->getDescription(), 'Forty : Fifteen');
});

test('40 30', function () {
    $g = new Game(3, 2);
    $this->assertEquals($g->getDescription(), 'Forty : Thirty');
});

test('40 All', function () {
    $g = new Game(3, 3);
    $this->assertEquals($g->getDescription(), 'Forty All');
});

test('Advantage Left', function () {
    $g = new Game(4, 3);
    $this->assertEquals($g->getDescription(), 'Advantage Left');
});

test('Deuce Low', function () {
    $g = new Game(4, 4);
    $this->assertEquals($g->getDescription(), 'Deuce');
});

test('Advantage Right', function () {
    $g = new Game(4, 5);
    $this->assertEquals($g->getDescription(), 'Advantage Right');
});

test('Deuce High', function () {
    $g = new Game(10, 10);
    $this->assertEquals($g->getDescription(), 'Deuce');
});

test('Left Win High', function () {
    $g = new Game(102, 100);
    $this->assertEquals($g->getDescription(), 'Left Wins!');
});

test('Right Win High', function () {
    $g = new Game(100, 102);
    $this->assertEquals($g->getDescription(), 'Right Wins!');
});

test('Throws for negative values', function () {
    new Game(1, -1);
})->throws(Exception::class, 'Scores must be a positive integer!');

test('Throws for bad vals', function () {
    new Game(5, 0);
})->throws(Exception::class, 'Score diff of >2 should not be possible!');
