<?php

namespace App\Libs;

use App\Enums\ScoreOption;
use Exception;

/*
 * Zero to three points are given the terms "Love", "Fifteen", "Thirty", and "Forty" respectively.
 * If both players have the same score below three points ("Forty") then the score is suffixed with
  "All" (Example: "Thirty All").
 * If at least three points have been scored by both players, and the score is equal, then the score
  is "Deuce".
 * If at least three points have been scored by both players but one player has one more point than
  the other, then the score for the player ahead is "Advantage".
 * A game is won by the first player to score at least four points in total and at least two more
  points than their opponent.
*/

class Game
{
    private const TO_WIN = 2;

    public function __construct(
        private int $left,
        private int $right,
    ) {
        // Some validation on the values passed in.
        if ($left < 0 || $right < 0) {
            throw new Exception('Scores must be a positive integer!');
        }

        if (
            abs($left - $right) > self::TO_WIN
            && ($left > ScoreOption::WIN->value || $right > ScoreOption::WIN->value)
        ) {
            throw new Exception(sprintf('Score diff of >%s should not be possible!', self::TO_WIN));
        }
    }

    public function getDescription(): string
    {
        // If scores are equal, it's either 'Deuce' or 'All'
        if ($this->left === $this->right) {
            return $this->left >= ScoreOption::WIN->value
                ? 'Deuce'
                : ScoreOption::from($this->left)->description() . ' All';
        }

        // If we have a winner we can bail early.
        if ($this->hasWinner()) {
            return $this->getLeader() . ' Wins!';
        }

        if ($this->isInAdvantage()) {
            return 'Advantage ' . $this->getLeader();
        }

        // No tie, no winner, no advantage so show score.
        return sprintf(
            '%s : %s',
            ScoreOption::from($this->left)->description(),
            ScoreOption::from($this->right)->description(),
        );
    }

    // We have a winner if one player has >= 3 points and the gap is bigger 2
    public function hasWinner(): bool
    {
        if (($this->left + $this->right) < ScoreOption::WIN->value) {
            return false;
        }

        return $this->isInAdvantage()
            ? (abs($this->left - $this->right) >= self::TO_WIN) // If we're in advantage and either player leads by +2
            : $this->left === ScoreOption::WIN->value || $this->right === ScoreOption::WIN->value;
    }

    private function getLeader(): string
    {
        return $this->left > $this->right ? 'Left' : 'Right';
    }

    // @TODO: This name feels uncomfortable, it means "are we out of a normal game length 0-4 points".
    private function isInAdvantage(): bool
    {
        return $this->left >= ScoreOption::FORTY->value && $this->right >= ScoreOption::FORTY->value;
    }
}
