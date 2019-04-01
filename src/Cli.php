<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run()
{
    print_r("Welcome to the Brain Games!\n");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
