<?php

namespace BrainGames\Calcgame;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;

function calc()
{
    define("OPERATORS", ['+','-','*']);
    define("GAME_DEFINITION", "What is the result of the expression?");

    $randomArrWith2NumbersAndOperator = function () {
        $randOperator = constant("OPERATORS")[array_rand(constant("OPERATORS"))];
        $randNumber1 = rand(-10, 10);
        $randNumber2 = rand(-10, 10);

        return [$randNumber1, $randOperator, $randNumber2];
    };

    $calcFunc = function ($arr) {
        switch ($arr[1]) {
            case '+':
                return $arr[0] + $arr[2];
            case '-':
                return $arr[0] - $arr[2];
            default:
                return $arr[0] * $arr[2];
        }
    };

    $questionLine = function ($arr) {
        switch ($arr[1]) {
            case '+':
                return "{$arr[0]} + {$arr[2]}";
            case '-':
                return "{$arr[0]} - {$arr[2]}";
            default:
                return "{$arr[0]} * {$arr[2]}";
        }
    };

    run(constant("GAME_DEFINITION"), $questionLine, $calcFunc, $randomArrWith2NumbersAndOperator);
}
