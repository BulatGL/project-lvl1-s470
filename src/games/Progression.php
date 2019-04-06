<?php

namespace BrainGames\Progression;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;

const TRIES_TO_WIN = 3;
const GAME_DEFINITION = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;
const MAX_PROGRESSION_INDEX = PROGRESSION_LENGTH - 1;

function makeProgression()
{
    $firstNum = rand(1, 100);
    $difference = rand(1, 10);
    $result = [];
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        if ($i === 0) {
            $result[] = $firstNum;
        } else {
            $result[] = $result[$i - 1] + $difference;
        }
    }

    return $result;
}

function guessNumberInProgression()
{
    $triesCount = 0;

    $iter = function ($triesCount) use (&$iter) {
        if ($triesCount > TRIES_TO_WIN) {
            return;
        }

        $index = rand(0, MAX_PROGRESSION_INDEX);
        $randomNumbers = makeProgression();
        $answer = $randomNumbers[$index];
        $numbersWithMissingNum = $randomNumbers;
        $numbersWithMissingNum[$index] = '..';

        $question = implode(' ', $numbersWithMissingNum);
        run(GAME_DEFINITION, $question, $answer, $triesCount);
        $iter($triesCount + 1);
    };

    $iter($triesCount);
}
