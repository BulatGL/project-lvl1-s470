<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const TRIES_TO_WIN = 3;

function run($gameRules, $questionsAndAnswers)
{
    line("Welcome to the Brain Games!");
    line("{$gameRules}\n");

    $name = prompt('May I have your name?');
    line("Hello, {$name}!\n");

    $triesCount = 0;
    $iter = function ($triesCount) use (&$iter, $questionsAndAnswers, $name) {
        if ($triesCount === TRIES_TO_WIN) {
            line("Congratulations, {$name}");
            return;
        }

        $answer = printQuestionRetrieveAnswer($questionsAndAnswers, $triesCount);
        $userAnswer = prompt("Your answer ");
        $userAnswer = gettype($answer) === 'integer' ? (int) $userAnswer : $userAnswer;
        // Ответ пользователя, будь это число или строка, после ввода всегда оказывается строкой,
        // поэтому добавил это явное указание типа.
        if ($userAnswer === $answer) {
            line("Correct!");
            $iter($triesCount + 1);
        } else {
            line("Let's try again, {$name}");
            return;
        }
    };

    $iter($triesCount);
}

function printQuestionRetrieveAnswer($questionsAndAnswers, $triesCount)
{
    $i = 0;
    // Формируемый в играх массив с вопросами и ответами у меня всегда ассоциативный,
    // поэтому добавил к foreach ещё и индекс.
    foreach ($questionsAndAnswers as $key => $element) {
        if ($i === $triesCount) {
            line("Question: {$key}");
            return $element;
        }
        $i++;
    }
}
