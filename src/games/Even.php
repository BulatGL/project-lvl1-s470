<?php

namespace BrainGames\Even;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;
use const BrainGames\Engine\TRIES_TO_WIN as NUMBER_OF_QUESTIONS_AND_ANSWERS;

const GAME_DESCRIPTION = "Answer 'yes' if number even otherwise answer 'no'.";

function makeEvenGameData()
{
    $gameData = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS_AND_ANSWERS; $i++) {
        $question = rand(1, 100);
        $answer = $num % 2 === 0 ? 'yes' : 'no';

        $gameData[$question] = $answer;
    }

    run(GAME_DESCRIPTION, $gameData);
}
