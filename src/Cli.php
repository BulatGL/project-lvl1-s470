<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run($gameRules = '', $question = '', $answer = 0, $triesCount = 0)
{
    if ($triesCount === 0) {
        line("Welcome to the Brain Games!");

        if ($gameRules === '') {
            return;
        }

        line("{$gameRules}\n");
        define("NAME", prompt('May I have your name?'));
        // Использование стандартной конструкции const NAME = ... в этом месте, приводит к ошибке 'syntax error, unexpected 'const' (T_CONST)'.
        // const я использовал чтобы иметь доступ к NAME во всем коде, переменная этого понятно дело не позволяла. Можно ли как то ещё пробросить name на уровень общей функции?
        line("Hello, " . NAME . "!\n");
    }

    $triesToWin = 3;

    if ($triesCount === $triesToWin) {
        line("Congratulations, " . NAME);
        return;
    }

    line("Question: {$question}");
    $userAnswer = prompt("Your answer: ");

    $userAnswer = $userAnswer === 'yes' || $userAnswer === 'no' ? $userAnswer : (int) $userAnswer;

    if ($userAnswer === $answer) {
        line("Correct!");
    } else {
        line("Let's try again, " . NAME);
        exit();
        // Если не использовать инструкцию exit, то у меня нет догадок как прекратить действие итера в игре, потому что от него информация в движок передаётся, но от движка к итеру нет, а значит движок не сможет сообщить что игра закончилась.
        // А если не использовать итер в игре, а в движке, то информация от игры передаётся 1 раз, то есть итер движка (если он есть), будет гонять одни и те же данные (если не передавать в движок функции вместо готовых значений как я это делал в предыдущей реализации).
    }
}
