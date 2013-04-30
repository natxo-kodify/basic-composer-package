<?php

function message()
{
    $command = "php composer.phar install --dev";
    return 'Install dependencies to run test suite. ' . $command;
}

$file = __DIR__.'/../vendor/autoload.php';
if (!file_exists($file)) {
    throw new RuntimeException(message());
}

require_once $file;
