<?php

namespace BrainGames\Even;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;
use const BrainGames\Cli\TRIES_TO_WIN as NUMBER_OF_Q_AND_A;

const GAME_DEFINITION = "Answer 'yes' if number even otherwise answer 'no'.";

function constructEvens()
{
    $result = [];
    for ($i = 0; $i < NUMBER_OF_Q_AND_A; $i++) {
        $num = rand(1, 100);
        $result["{$num}"] = $num % 2 === 0 ? 'yes' : 'no';
    }

    run(GAME_DEFINITION, $result);
}
