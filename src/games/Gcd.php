<?php

namespace BrainGames\Gcd;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;
use const BrainGames\Engine\TRIES_TO_WIN as NUMBER_OF_QUESTIONS_AND_ANSWERS;

const GAME_DESCRIPTION = "Find the greatest common divisor of given numbers.";

function findGcd($num1, $num2)
{
    $max = max($num1, $num2);
    $min = min($num1, $num2);

    if ($min === 0) {
        return $max;
    }

    return findGcd($min, $max % $min);
}

function makeGcdGameData()
{
    $gameData = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS_AND_ANSWERS; $i++) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $question = "{$num1} {$num2}";
        $answer = findGcd($num1, $num2);

        $gameData[$question] = (string) $answer;
    }

    run(GAME_DESCRIPTION, $gameData);
}
