<?php

namespace BrainGames\Calcgame;

use function \cli\line;
use function \cli\prompt;

function isAnswerRight($calcResult, $name)
{
    $answer = prompt("Your answer: ");
    if ((int) $answer === (int) $calcResult) {
        line("Correct!");
        return true;
    } else {
        line("{$answer} is wrong answer ;(. Correct answer was {$calcResult}");
        line("Let's try again, {$name}!");
        return false;
    }
}

function calc($triesCount, $name)
{
    if ($triesCount === 0) {
        line("Congratulations, {$name}!");
        return;
    }

    $operators = ['+','-','*'];
    $randOperator = $operators[array_rand($operators)];
    $randNumber1 = rand(-100, 100);
    $randNumber2 = rand(-100, 100);

    if ($randOperator === '+') {
        $calcResult = $randNumber1 + $randNumber2;
        line("Question: {$randNumber1} + {$randNumber2}");
        return isAnswerRight($calcResult, $name) ? calc($triesCount - 1, $name) : calc($triesCount, $name);
    } elseif ($randOperator === '-') {
        $calcResult = $randNumber1 - $randNumber2;
        line("Question: {$randNumber1} - {$randNumber2}");
        return isAnswerRight($calcResult, $name) ? calc($triesCount - 1, $name) : calc($triesCount, $name);
    } else {
        $calcResult = $randNumber1 * $randNumber2;
        line("Question: {$randNumber1} * {$randNumber2}");
        return isAnswerRight($calcResult, $name) ? calc($triesCount - 1, $name) : calc($triesCount, $name);
    }
}
