<?php

namespace BrainGames\Calc;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;

const GAME_DEFINITION = "What is the result of the expression?";
const OPERATORS = ['+','-','*'];
const TRIES_TO_WIN = 3;

function calc()
{
    $triesCount = 0;

    $iter = function ($triesCount) use (&$iter) {
        if ($triesCount > TRIES_TO_WIN) {
            return;
        }

        $randOperator = OPERATORS[array_rand(OPERATORS)];
        $randNumber1 = rand(-10, 10);
        $randNumber2 = rand(-10, 10);

        switch ($randOperator) {
            case '+':
                run(GAME_DEFINITION, "{$randNumber1} + {$randNumber2}", $randNumber1 + $randNumber2, $triesCount);
                break;
            case '-':
                run(GAME_DEFINITION, "{$randNumber1} - {$randNumber2}", $randNumber1 - $randNumber2, $triesCount);
                break;
            default:
                run(GAME_DEFINITION, "{$randNumber1} * {$randNumber2}", $randNumber1 * $randNumber2, $triesCount);
                break;
        }

        $iter($triesCount + 1);
    };

    $iter($triesCount);
}
