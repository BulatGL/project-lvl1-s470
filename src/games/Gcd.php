<?php

namespace BrainGames\Gcd;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;
use const BrainGames\Cli\TRIES_TO_WIN as NUMBER_OF_Q_AND_A;

const GAME_DEFINITION = "Find the greatest common divisor of given numbers.";

function findGcd($num1, $num2)
{
    $max = max([$num1, $num2]);
    $min = min([$num1, $num2]);

    if ($min === 0) {
        return $max;
    }

    return findGcd($min, $max % $min);
}

function constructGcd()
{
    $result = [];
    for ($i = 0; $i < NUMBER_OF_Q_AND_A; $i++) {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $answer = findGcd($num1, $num2);
        $question = "{$num1} {$num2}";

        $result[$question] = $answer;
    }

    run(GAME_DEFINITION, $result);
}
