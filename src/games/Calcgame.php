<?php

namespace BrainGames\Calcgame;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;
use function BrainGames\Cli\askName;
use function BrainGames\Cli\isUserRight;
use function BrainGames\Cli\printQuestionAndAnswer;
use function BrainGames\Cli\nextRoundOrFinish;
use function BrainGames\Cli\congratulate;

function makeAdditionalLine($answer, $calcResult)
{
    return "{$answer} is wrong answer ;(. Correct answer was {$calcResult}";
}

function calc()
{
    run("What is the result of the expression?");
    $name = askName();
    $operators = ['+','-','*'];

    $iterCalc = function ($triesCount) use (&$iterCalc, $name, $operators) {
        $randOperator = $operators[array_rand($operators)];
        $randNumber1 = rand(-10, 10);
        $randNumber2 = rand(-10, 10);

        if ($triesCount === 0) {
            congratulate($name);
            return;
        }

        switch ($randOperator) {
            case '+':
                $calcResult = $randNumber1 + $randNumber2;
                $answer = printQuestionAndAnswer("Question: {$randNumber1} + {$randNumber2}");
                $additionalLine = makeAdditionalLine($answer, $calcResult);
                nextRoundOrFinish($iterCalc, isUserRight($answer, $calcResult), $triesCount, $name, $additionalLine);
                break;
            case '-':
                $calcResult = $randNumber1 - $randNumber2;
                $answer = printQuestionAndAnswer("Question: {$randNumber1} - {$randNumber2}");
                $additionalLine = makeAdditionalLine($answer, $calcResult);
                nextRoundOrFinish($iterCalc, isUserRight($answer, $calcResult), $triesCount, $name, $additionalLine);
                break;
            default:
                $calcResult = $randNumber1 * $randNumber2;
                $answer = printQuestionAndAnswer("Question: {$randNumber1} * {$randNumber2}");
                $additionalLine = makeAdditionalLine($answer, $calcResult);
                nextRoundOrFinish($iterCalc, isUserRight($answer, $calcResult), $triesCount, $name, $additionalLine);
                break;
        }
    };

    $iterCalc(3);
}
