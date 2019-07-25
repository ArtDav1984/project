<?php

spl_autoload_register(function ($class_name)
{
    $array_paths = array(
        'models/',
        'components/'
    );

    foreach ($array_paths as $path) {
        $path = $path .$class_name .  '.php';
        if (file_exists($path)) {
            require_once $path;
        }
    }
});



