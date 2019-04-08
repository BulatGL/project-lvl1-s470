<?php

namespace BrainGames\Prime;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;
use const BrainGames\Engine\TRIES_TO_WIN as NUMBER_OF_QUESTIONS_AND_ANSWERS;

const GAME_DESCRIPTION = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function isPrime($num)
{
    $firstDivisor = 2;

    if ($num < $firstDivisor) {
        return false;
    }

    for ($i = $firstDivisor; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function makePrimeGameData()
{
    $gameData = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS_AND_ANSWERS; $i++) {
        $question = rand(1, 100);
        $answer = isPrime($question) ? 'yes' : 'no';

        $gameData[$question] = $answer;
    }

    run(GAME_DESCRIPTION, $gameData);
}
