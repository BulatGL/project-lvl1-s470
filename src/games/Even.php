<?php

namespace BrainGames\Even;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;

const GAME_DEFINITION = "Answer 'yes' if number even otherwise answer 'no'.";

function even()
{
    $triesCount = 0;

    $iter = function ($triesCount) use (&$iter) {
        if ($triesCount === 4) {
            return;
        }

        $numberForLineAndAnswer = function () {
            return rand(1, 100);
        };

        $number = $numberForLineAndAnswer();

        $question = function ($number) {
            return "{$number}";
        };

        $answer = function ($number) {
            return $number % 2 === 0 ? 'yes' : 'no';
        };

        run(GAME_DEFINITION, $question($number), $answer($number), $triesCount);
        $iter($triesCount + 1);
    };

    $iter($triesCount);
}
