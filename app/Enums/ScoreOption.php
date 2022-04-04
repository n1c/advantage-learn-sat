<?php

namespace App\Enums;

enum ScoreOption: int
{
    case LOVE = 0;
    case FIFTEEN = 1;
    case THIRTY = 2;
    case FORTY = 3;
    case WIN = 4;

    public function description(): string
    {
        return match($this) {
            self::LOVE => 'Love',
            self::FIFTEEN => 'Fifteen',
            self::THIRTY => 'Thirty',
            self::FORTY => 'Forty',
        };
    }
}
