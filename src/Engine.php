<?php

namespace BrainGames\Engine;

use function \cli\line;
use function \cli\prompt;

const TRIES_TO_WIN = 3;

function run($gameRules, $questionsAndAnswers)
{
    line("Welcome to the Brain Games!");
    line("{$gameRules}\n");

    $name = prompt('May I have your name?');
    line("Hello, {$name}!\n");

    foreach ($questionsAndAnswers as $question => $answer) {
        line("Question: {$question}");
        $userAnswer = prompt("Your answer ");
        if ($userAnswer === $answer) {
            line("Correct!");
        } else {
            line("Let's try again, {$name}");
            return;
        }
    }

    line("Congratulations, {$name}");
}
