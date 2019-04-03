<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;
use function BrainGames\Calcgame\calc;
use function BrainGames\Evengame\even;

function run($func = null, $gameRules = '')
{
    line("Welcome to the Brain Games!");
    if ($gameRules !== '') {
        line("{$gameRules}\n");
    }
    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);

    switch ($func) {
        case 'calc':
            return calc(3, $name);
        case 'even':
            return even(3, $name);
        case null:
            return;
    }
}
