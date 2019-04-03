<?php

namespace BrainGames\Calcgame;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;

function isAnswerRight($answer, $calcResult)
{
    return (int) $answer === (int) $calcResult;
}

function calc()
{
    $name = run("What is the result of the expression?");

    $iterCalc = function ($triesCount) use (&$iterCalc, $name) {
        $operators = ['+','-','*'];
        $randOperator = $operators[array_rand($operators)];
        $randNumber1 = rand(-10, 10);
        $randNumber2 = rand(-10, 10);

        if ($triesCount === 0) {
            line("Congratulations, {$name}!");
            return;
        }

        $iterCalcRepeatOrStop = function ($calcResult, $randNumber1, $randNumber2) use ($name, $iterCalc, $triesCount) {
            $answer = prompt("Your answer: ");
            if (isAnswerRight($answer, $calcResult)) {
                line("Correct!");
                $iterCalc($triesCount - 1);
            } else {
                line("{$answer} is wrong answer ;(. Correct answer was {$calcResult}");
                line("Let's try again, {$name}!");
            }
        };

        switch ($randOperator) {
            case '+':
                $calcResult = $randNumber1 + $randNumber2;
                line("Question: {$randNumber1} + {$randNumber2}");
                $iterCalcRepeatOrStop($calcResult, $randNumber1, $randNumber2);
                break;
            case '-':
                $calcResult = $randNumber1 - $randNumber2;
                line("Question: {$randNumber1} - {$randNumber2}");
                $iterCalcRepeatOrStop($calcResult, $randNumber1, $randNumber2);
                break;
            default:
                $calcResult = $randNumber1 * $randNumber2;
                line("Question: {$randNumber1} * {$randNumber2}");
                $iterCalcRepeatOrStop($calcResult, $randNumber1, $randNumber2);
                break;
        }
    };

    $iterCalc(3);
}
