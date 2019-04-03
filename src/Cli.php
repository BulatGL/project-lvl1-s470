<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run($gameRules = '')
{
    line("Welcome to the Brain Games!");
    if ($gameRules !== '') {
        line("{$gameRules}\n");
    }
    $name = prompt('May I have your name?');
    line("Hello, %s!\n", $name);

    return $name;
}
