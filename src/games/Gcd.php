<?php

namespace BrainGames\Gcd;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;

const GAME_DEFINITION = "Find the greatest common divisor of given numbers.";
const TRIES_TO_WIN = 3;

function findGcd($num1, $num2)
{
    $max = max([$num1, $num2]);
    $divisor = 1;
    $firstDivisor = 1;
    for ($i = $firstDivisor; $i <= $max; $i++) {
    // У меня была ситуация когда было два одинаковых рандомных числа,
    // соотвественно наибольший делитель находился некорректно,
    // поэтому проверкой поставил $i <= $max, а не $i <= $max / 2.
        if ($num1 % $i === 0 && $num2 % $i === 0) {
            $divisor = $i;
        }
    }

    return $divisor;
}

function guessGcd()
{
    $triesCount = 0;

    $iter = function ($triesCount) use (&$iter) {
        if ($triesCount > TRIES_TO_WIN) {
            return;
        }

        $num1 = rand(1, 100);
        $num2 = rand(1, 100);

        $answer = findGcd($num1, $num2);

        $question = "{$num1} {$num2}";

        run(GAME_DEFINITION, $question, $answer, $triesCount);
        $iter($triesCount + 1);
    };

    $iter($triesCount);
}
