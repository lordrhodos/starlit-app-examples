<?php

return [
    'phpSettings' => [
        'max_execution_time'        => 5000,
        'memory_limit'              => '128M',
        'date' => array('timezone'  => 'Europe/Stockholm'),
        'log_errors'                => '1',
        'error_log'                 => '/dev/stderr',
        'default_charset'           => 'UTF-8',
        'display_errors'            => (APP_ENV === 'development'),
        'error_reporting'           => -1,
        'intl.default_locale'       => 'en',
    ],
    'router' => [
        'controllerNamespace' => 'Starlit\\App\\Examples\\Controller',
        'routes' => require 'routes.php',
    ],
];
