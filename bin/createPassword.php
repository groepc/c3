<?php
use \helpers\Password;

if(file_exists(__DIR__.'/../vendor/autoload.php')){
    require __DIR__.'/../vendor/autoload.php';
} else {
    echo "Please install via composer.json";
    exit;
}

$hash = Password::make($argv[1]);

echo PHP_EOL.$hash.PHP_EOL.PHP_EOL;