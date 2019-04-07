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
        $num1 = rand(-100, 100);
        $num2 = rand(-100, 100);
        $question = "{$num1} {$operator} {$num2}";

        switch ($operator) {
            case '+':
                $answer = $num1 + $num2;
                break;
            case '-':
                $answer = $num1 - $num2;
                break;
            case '*':
                $answer = $num1 * $num2;
                break;
        }

        $answer = (string) $answer;
        $gameData[$question] = $answer;
    }

    run(GAME_DESCRIPTION, $gameData);
}
