<?php

namespace BrainGames\Calc;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Engine\run;
use const BrainGames\Engine\TRIES_TO_WIN as NUMBER_OF_QUESTIONS_AND_ANSWERS;

const GAME_DESCRIPTION = "What is the result of the expression?";
const OPERATORS = ['+','-','*'];

function makeCalcGameData()
{
    $gameData = [];
    for ($i = 0; $i < NUMBER_OF_QUESTIONS_AND_ANSWERS; $i++) {
        $operator = OPERATORS[array_rand(OPERATORS)];
        $num1 = rand(-10, 10);
        $num2 = rand(-10, 10);

        switch ($operator) {
            case '+':
                $question = "{$num1} + {$num2}";
                $answer = $num1 + $num2;
                $gameData[$question] = (string) $answer;
                break;
            case '-':
                $question = "{$num1} - {$num2}";
                $answer = $num1 - $num2;
                $gameData[$question] = (string) $answer;
                break;
            default:
                $question = "{$num1} * {$num2}";
                $answer = $num1 * $num2;
                $gameData[$question] = (string) $answer;
                break;
        }
    }

    run(GAME_DESCRIPTION, $gameData);
}
