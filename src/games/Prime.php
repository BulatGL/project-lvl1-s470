<?php

namespace BrainGames\Prime;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;
use const BrainGames\Cli\TRIES_TO_WIN as NUMBER_OF_Q_AND_A;

const GAME_DEFINITION = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function isPrime($num)
{
    $firstDivisor = 2;
    for ($i = $firstDivisor; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function constructPrimes()
{
    $result = [];
    for ($i = 0; $i < NUMBER_OF_Q_AND_A; $i++) {
        $num = rand(1, 100);
        $result["{$num}"] = isPrime($num) ? 'yes' : 'no';
    }

    run(GAME_DEFINITION, $result);
}
