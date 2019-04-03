<?php

namespace BrainGames\Evengame;

use function \cli\line;
use function \cli\prompt;

function even($triesCount, $name)
{
    if ($triesCount === 0) {
        line("Congratulations, %s!", $name);
        return;
    }

    $random = rand(1, 100);
    $isEven = $random % 2 === 0;
    line("Question: %d", $random);
    $answer = prompt("Your answer: ");
    if ($answer === "yes" && $isEven || $answer === "no" && !$isEven) {
        line("Correct!");
        return even($triesCount - 1, $name);
    } else {
        line("Let's try again, %s", $name);
        return even($triesCount, $name);
    }
}
