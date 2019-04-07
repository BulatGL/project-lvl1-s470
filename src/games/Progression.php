<?php

namespace BrainGames\Progression;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;
use const BrainGames\Cli\TRIES_TO_WIN as NUMBER_OF_Q_AND_A;

const GAME_DEFINITION = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;

function makeProgression()
{
    $first = rand(1, 100);
    $difference = rand(1, 10);
    $result = [];
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $result[] = $first + $difference * $i;
    }

    return $result;
}

function constructMissingElementProgressions()
{
    $result = [];
    for ($i = 0; $i < NUMBER_OF_Q_AND_A; $i++) {
        $missingIndex = rand(0, PROGRESSION_LENGTH - 1);
        $randomProgression = makeProgression();
        $answer = $randomProgression[$missingIndex];
        $missingElementProgression = $randomProgression;
        $missingElementProgression[$missingIndex] = '..';
        $question = implode(' ', $missingElementProgression);

        $result[$question] = $answer;
    }

    run(GAME_DEFINITION, $result);
}
