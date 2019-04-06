<?php

namespace BrainGames\Progression;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Cli\run;
use function BrainGames\Cli\askName;
use function BrainGames\Cli\isUserRight;
use function BrainGames\Cli\printQuestionAndAnswer;
use function BrainGames\Cli\nextRoundOrFinish;
use function BrainGames\Cli\congratulate;

function makeProgression()
{
    $randomFirstNum = rand(1, 100);
    $resultArray = [$randomFirstNum];
    $randomDifference = rand(1, 10);
    for ($i = 1; $i < 10; $i++) {
        $resultArray[] = $resultArray[$i - 1] + $randomDifference;
    }

    return $resultArray;
}

function guessNumberInProgression()
{
    run("What number is missing in the progression?");
    $name = askName();

    $iterGuessNumberInProgression = function ($triesCount) use (&$iterGuessNumberInProgression, $name) {
        if ($triesCount === 0) {
            congratulate($name);
            return;
        }

        $randomIndex = rand(1, 9);
        $randomArr = makeProgression();
        $randomArrWithMissingNum = $randomArr;
        $missingNum = $randomArrWithMissingNum[$randomIndex];
        $randomArrWithMissingNum[$randomIndex] = '..';
        $randomArrToString = implode(' ', $randomArrWithMissingNum);
        $answer = printQuestionAndAnswer("Question: {$randomArrToString}");
        nextRoundOrFinish($iterGuessNumberInProgression, isUserRight($answer, $missingNum), $triesCount, $name);
    };

    $iterGuessNumberInProgression(3);
}
