<?php

namespace BrainGames\Evengame;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;

function isEven($question, $answer, $name)
{
    $isOdd = $question % 2 === 0;
    if ($answer === "yes" && $isOdd || $answer === "no" && !$isOdd) {
        return true;
    } else {
        return false;
    }
}

function even()
{
    $name = run("Answer 'yes' if number even otherwise answer 'no'.");

    $iterEven = function ($triesCount) use (&$iterEven, $name) {
        if ($triesCount === 0) {
            line("Congratulations, %s!", $name);
            return;
        }

        $question = rand(1, 100);
        line("Question: %d", $question);
        $answer = prompt("Your answer: ");

        if (isEven($question, $answer, $name)) {
            line("Correct!");
            $iterEven($triesCount - 1, $name);
        } else {
            line("Let's try again, {$name}");
        }
    };

    return $iterEven(3);
}
