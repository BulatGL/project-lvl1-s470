<?php

namespace BrainGames\Gcdgame;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;

function findGreatestDivisor($number1, $number2)
{
    $divisor = 1;
    $i = 1;
    while ($i <= $number1 / 2) {
        if ($number1 % $i === 0 && $number2 % $i === 0) {
            $divisor = $i;
        }
        $i++;
    }

    return $divisor;
}

function gcd()
{
    $name = run("Find the greatest common divisor of given numbers.");

    $iterGcd = function ($triesCount) use (&$iterGcd, $name) {
        if ($triesCount === 0) {
            line("Congratulations, {$name}");
            return;
        }

        $randNumb1 = rand(1, 100);
        $randNumb2 = rand(1, 100);
        $greatestDivisor = $randNumb1 > $randNumb2 ? findGreatestDivisor($randNumb1, $randNumb2) : findGreatestDivisor($randNumb2, $randNumb1);

        line("Question: {$randNumb1} {$randNumb2}");
        $answer = prompt("Your answer: ");
        if ((int) $answer === $greatestDivisor) {
            line("Correct!");
            $iterGcd($triesCount - 1);
        } else {
            line("Let's try again, {$name}!");
        }
    };

    $iterGcd(3);
}
