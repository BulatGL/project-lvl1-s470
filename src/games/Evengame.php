<?php

namespace BrainGames\Evengame;

use function \cli\line;
use function \cli\prompt;

function isEven($question, $answer, $name)
{
    $isOdd = $question % 2 === 0;
    if ($answer === "yes" && $isOdd || $answer === "no" && !$isOdd) {
        line("Correct!");
        return true;
    } else {
        line("Let's try again, {$name}");
        return false;
    }
}

function even($triesCount, $name)
{
    if ($triesCount === 0) {
        line("Congratulations, %s!", $name);
        return;
    }

    $question = rand(1, 100);
    line("Question: %d", $question);
    $answer = prompt("Your answer: ");

    // return !isEven($question, $answer, $name) ?: even($triesCount - 1, $name);
    !isEven($question, $answer, $name) ?: even($triesCount - 1, $name);
}
