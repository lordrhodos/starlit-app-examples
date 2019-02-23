<?php

// set a global root path
define('ROOT_PATH', dirname(__DIR__));
chdir(ROOT_PATH);

// use composer autloading
require 'vendor/autoload.php';

// load environment variables
if (getenv('APP_ENV') !== 'production') {
    (new Dotenv\Dotenv(ROOT_PATH))->overload();
}

// define environment
define('APP_ENV', getenv('APP_ENV'));

// init the application
$app = new \Starlit\App\BaseApp(require 'app/configuration/configuration.php', APP_ENV);
$request = Symfony\Component\HttpFoundation\Request::createFromGlobals();
$response = $app->handle($request);
$response->send();