<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function askName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);

    return $name;
}

function run($gameRules = '')
{
    line("Welcome to the Brain Games!");
    if ($gameRules !== '') {
        line("{$gameRules}\n");
    }
}

function printQuestionAndAnswer($questionLine)
{
      line($questionLine);
      return prompt("Your answer: ");
}

function isUserRight($userAnswer, $rightAnswer)
{
    $dataType = gettype($rightAnswer);
    if ($dataType === 'integer') {
        return (int) $userAnswer === $rightAnswer;
    }

    return $userAnswer === $rightAnswer;
}

function isUserRightYesOrNoEdition($answer, $condition)
{
    return $answer === "yes" && $condition || $answer === "no" && !$condition;
}

function nextRoundOrFinish($iterFunc, $isUserRight, $triesCount, $name, $additionalLine = '')
{
    if ($isUserRight) {
        line("Correct!");
        $iterFunc($triesCount - 1, $name);
    } else {
        if ($additionalLine !== '') {
            line($additionalLine);
        }
        line("Let's try again, {$name}");
    }
}

function congratulate($name)
{
        line("Congratulations, {$name}");
}
