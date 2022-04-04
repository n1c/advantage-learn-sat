<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Libs\Game;
use Inertia\Inertia;

class GameController
{
    public function __invoke()
    {
        return Inertia::render('Game');
    }

    public function store(GameRequest $request)
    {
        $left = (int) $request->input('left', 0);
        $right = (int) $request->input('right', 0);
        $game = new Game($left, $right);

        return Inertia::render('Game', [
            'description' => $game->getDescription(),
            'isFinished' => $game->hasWinner(),
            'left' => $left,
            'right' => $right,
        ]);
    }
}
