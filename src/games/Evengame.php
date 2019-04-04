<?php

namespace BrainGames\Evengame;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;
use function BrainGames\Cli\askName;
use function BrainGames\Cli\isUserRightYesOrNoEdition;
use function BrainGames\Cli\printQuestionAndAnswer;
use function BrainGames\Cli\nextRoundOrFinish;
use function BrainGames\Cli\congratulate;

function isEven($question)
{
    return $question % 2 === 0;
}

function even()
{
    run("Answer 'yes' if number even otherwise answer 'no'.");
    $name = askName();

    $iterEven = function ($triesCount) use (&$iterEven, $name) {
        if ($triesCount === 0) {
            congratulate($name);
            return;
        }

        $question = rand(1, 100);
        $answer = printQuestionAndAnswer("Question: {$question}");

        nextRoundOrFinish($iterEven, isUserRightYesOrNoEdition($answer, isEven($question)), $triesCount, $name);
    };

    $iterEven(3);
}
