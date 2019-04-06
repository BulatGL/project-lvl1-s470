<?php

namespace BrainGames\Evengame;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;

function even()
{
    define("GAME_DEFINITION", "Answer 'yes' if number even otherwise answer 'no'.");

    $numberForLineAndAnswer = function () {
        return rand(1, 100);
    };

    $questionLine = function ($number) {
        return "{$number}";
    };

    $answerFunc = function ($number) {
        return $number % 2 === 0 ? 'yes' : 'no';
    };

    run(constant("GAME_DEFINITION"), $questionLine, $answerFunc, $numberForLineAndAnswer);
}
