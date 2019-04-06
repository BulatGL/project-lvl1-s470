<?php

namespace BrainGames\Gcdgame;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;

const GAME_DEFINITION = "Find the greatest common divisor of given numbers.";

function guessGcd()
{
    $arrWith2RandomNums = function () {
        $randNumb1 = rand(1, 100);
        $randNumb2 = rand(1, 100);

        return [$randNumb1, $randNumb2];
    };

    $findGcd = function ($arr) {
        $max = max($arr);
        $num1 = $arr[0];
        $num2 = $arr[1];
        $divisor = 1;
        $i = 1;
        while ($i <= $max) {
            if ($num1 % $i === 0 && $num2 % $i === 0) {
                $divisor = $i;
            }
            $i++;
        }

        return $divisor;
    };

    $stringForQuestion = function ($arr) {
        $result = '';
        foreach ($arr as $element) {
            $result = "{$result} {$element}";
        }

        return $result;
    };

    run(GAME_DEFINITION, $stringForQuestion, $findGcd, $arrWith2RandomNums);
}
