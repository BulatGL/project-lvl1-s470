<?php

namespace BrainGames\Even;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;

const GAME_DEFINITION = "Answer 'yes' if number even otherwise answer 'no'.";
const TRIES_TO_WIN = 3;

function even()
{
    $triesCount = 0;

    $iter = function ($triesCount) use (&$iter) {
        if ($triesCount > TRIES_TO_WIN) {
            return;
        }

        $num = rand(1, 100);
        $question = "{$num}";
        $answer = $num % 2 === 0 ? 'yes' : 'no';

        run(GAME_DEFINITION, $question, $answer, $triesCount);
        $iter($triesCount + 1);
    };

    $iter($triesCount);
}
