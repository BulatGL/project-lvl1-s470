<?php

namespace BrainGames\Gcdgame;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;
use function BrainGames\Cli\askName;
use function BrainGames\Cli\isUserRight;
use function BrainGames\Cli\printQuestionAndAnswer;
use function BrainGames\Cli\nextRoundOrFinish;
use function BrainGames\Cli\congratulate;

function findMaxDivisor($number1, $number2)
{
    $divisor = 1;
    $i = 1;
    $max = max([$number1, $number2]);
    while ($i <= $max / 2) {
        if ($number1 % $i === 0 && $number2 % $i === 0) {
            $divisor = $i;
        }
        $i++;
    }

    return $divisor;
}

function guessGcd()
{
    run("Find the greatest common divisor of given numbers.");
    $name = askName();

    $iterGcd = function ($triesCount) use (&$iterGcd, $name) {
        if ($triesCount === 0) {
            congratulate($name);
            return;
        }

        $randNumb1 = rand(1, 100);
        $randNumb2 = rand(1, 100);
        $greatestDivisor = findMaxDivisor($randNumb1, $randNumb2);

        $answer = printQuestionAndAnswer("Question: {$randNumb1} {$randNumb2}");
        nextRoundOrFinish($iterGcd, isUserRight($answer, $greatestDivisor), $triesCount, $name);
    };

    $iterGcd(3);
}
