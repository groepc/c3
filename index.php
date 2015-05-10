<?php

use core\Config;
use core\Router;

if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
} else {
    echo '<h1>Please install via composer.json</h1>';
    echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
    echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
    exit;
}

if (!is_readable('app/core/Config.php')) {
    die('No Config.php found, configure and rename Config.example.php to Config.php in app/core.');
}

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
    define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but production will hide them.
 */

if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
        break;

        case 'production':
            error_reporting(0);
        break;

        default:
            exit('The application environment is not set correctly.');
    }
}

//initiate config
new Config();

//define routes
Router::any('', '\controllers\Administration@index');

Router::any('administration', '\controllers\Administration@index');
Router::any('administration/plan-exam', '\controllers\Administration@planExam');
Router::any('administration/prepare-exam', '\controllers\Administration@prepareExam');
Router::any('administration/evaluate-exam', '\controllers\Administration@evaluateExam');
Router::any('administration/evaluate-exam-view', '\controllers\Administration@evaluateExamView');
Router::any('administration/evaluate-exam-save', '\controllers\Administration@evaluateExamSave');
Router::any('administration/management-reporting', '\controllers\Administration@managementReporting');

Router::any('auth', '\controllers\Auth@index');
Router::any('auth/login', '\controllers\Auth@login');
Router::any('auth/logout', '\controllers\Auth@logout');

//if no route found
Router::error('\core\Error@index');

//turn on old style routing
Router::$fallback = false;

//execute matched routes
Router::dispatch();
