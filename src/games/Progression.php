<?php

namespace BrainGames\Progression;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;
use const BrainGames\Engine\TRIES_TO_WIN as NUMBER_OF_QUESTIONS_AND_ANSWERS;

const GAME_DESCRIPTION = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;

function makeProgressionWithMissingElement($missingElementIndex, $difference, $first)
{
    $progression = [];
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        if ($i === $missingElementIndex) {
            $progression[] = '..';
        } else {
            $progression[] = $first + $difference * $i;
        }
    }

    return $progression;
}

function makeProgressionGameData()
{
    $gameData = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS_AND_ANSWERS; $i++) {
        $missingElementIndex = rand(0, PROGRESSION_LENGTH - 1);
        $first = rand(1, 100);
        $difference = rand(1, 10);
        $progressionWithMissingElement = makeProgressionWithMissingElement($missingElementIndex, $difference, $first);
        $question = implode(' ', $progressionWithMissingElement);
        $answer = $first + $difference * $missingElementIndex;
        $answer = (string) $answer;

        $gameData[$question] = $answer;
    }

    run(GAME_DESCRIPTION, $gameData);
}
