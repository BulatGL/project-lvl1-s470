<?php

namespace BrainGames\Evengame;

use function \cli\line;
use function \cli\prompt;

function askIsNumberEven($triesCount, $name)
{
    if ($triesCount === 0) {
        line("Congratulations, %s!", $name);
        return;
    }

    $random = rand(1, 100);
    $isEven = $random % 2 === 0;
    line("Question: %s", $random);
    $answer = prompt("Your answer: ");
    if ($answer === "yes" && $isEven || $answer === "no" && !$isEven) {
        line("Correct!");
        return askIsNumberEven($triesCount - 1, $name);
    } else {
        line("Let's try again, %s", $name);
        return askIsNumberEven($triesCount, $name);
    }
}

function even()
{
    line("Welcome to the Brain Games!");
    line("Answer 'yes' if number even otherwise answer 'no'.");
    $name = prompt("\nMay I have your name?");
    line("Hello, %s!\n", $name);
    return askIsNumberEven(3, $name);
}
