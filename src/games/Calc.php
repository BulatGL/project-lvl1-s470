<?php

namespace BrainGames\Calc;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;
use const BrainGames\Cli\TRIES_TO_WIN as NUMBER_OF_Q_AND_A;

const GAME_DEFINITION = "What is the result of the expression?";
const OPERATORS = ['+','-','*'];

function constructCalcs()
{
    $result = [];
    for ($i = 0; $i < NUMBER_OF_Q_AND_A; $i++) {
        $operator = OPERATORS[array_rand(OPERATORS)];
        $num1 = rand(-10, 10);
        $num2 = rand(-10, 10);

        switch ($operator) {
            case '+':
                $result["{$num1} + {$num2}"] = $num1 + $num2;
                break;
            case '-':
                $result["{$num1} - {$num2}"] = $num1 - $num2;
                break;
            default:
                $result["{$num1} * {$num2}"] = $num1 * $num2;
                break;
        }
    }

    run(GAME_DEFINITION, $result);
}
