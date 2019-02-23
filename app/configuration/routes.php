<?php

return [
    // Default
    '/' => ['defaults' => ['controller' => 'index', 'action' => 'index']],
    '/{controller}/{action}/{param}' => ['defaults' => ['requirements' => ['controller' => '[a-z-]+', 'action' => '[a-z-]+']]],
    '/{controller}/{action}' => ['defaults' => ['requirements' => ['controller' => '[a-z-]+', 'action' => '[a-z-]+']]],
    '/{controller}' => ['defaults' => ['requirements' => ['controller' => '[a-z-]+']]],
];
