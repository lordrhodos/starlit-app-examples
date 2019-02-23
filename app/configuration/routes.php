<?php

return [
    // foo
    '/foo/bar/{id}' => ['defaults' => ['controller' => 'foo', 'action' => 'bar', 'requirements' => ['id' => '\d+']]],

    // Default
    '/' => ['defaults' => ['controller' => 'index', 'action' => 'index']],
    '/{controller}/{action}/{param}' => ['defaults' => ['requirements' => ['controller' => '[a-z-]+', 'action' => '[a-z-]+']]],
    '/{controller}/{action}' => ['defaults' => ['requirements' => ['controller' => '[a-z-]+', 'action' => '[a-z-]+']]],
    '/{controller}' => ['defaults' => ['requirements' => ['controller' => '[a-z-]+']]],
];
