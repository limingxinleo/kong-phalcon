<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader
    ->registerNamespaces(
        [
            'MyApp\Controllers' => $config->application->controllersDir,
            'MyApp\Controllers\Admin' => $config->application->controllersDir . 'admin',
            'MyApp\Models' => $config->application->modelsDir,

            'MyApp\Tasks' => $config->application->tasksDir,
        ]
    )->registerFiles(
        [
            'function' => $config->application->libraryDir . 'helper.php',
        ]
    )
    ->register();
