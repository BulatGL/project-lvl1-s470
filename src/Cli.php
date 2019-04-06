<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run($gameRules = '', $questionLine = '', $answerFunc = 0, $argForLineAndAnswer = 0)
{
    line("Welcome to the Brain Games!");

    if ($gameRules === '') {
        return;
    }

    line("{$gameRules}\n");
    $name = prompt('May I have your name?');
    line("Hello, {$name}!\n");

    $triesToWin = 3;

    $runIter = function ($triesCount) use (&$runIter, $questionLine, $answerFunc, $argForLineAndAnswer, $name) {
        if ($triesCount === 0) {
            line("Congratulations, {$name}");
            return;
        }

        $randomArgument = $argForLineAndAnswer();
        $questionLine = $questionLine($randomArgument);
        $answer = $answerFunc($randomArgument);

        line("Question: {$questionLine}");
        $userAnswer = prompt("Your answer: ");

        $userAnswer = $userAnswer === 'yes' || $userAnswer === 'no' ? $userAnswer : (int) $userAnswer;

        if ($userAnswer === $answer) {
            line("Correct!");
            $runIter($triesCount - 1);
        } else {
            line("Let's try again, {$name}");
        }
    };

    $runIter($triesToWin);
}
