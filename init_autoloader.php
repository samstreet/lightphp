<?php

function __autoload($class_name) {
    $classesDir = array (
        __DIR__.'/src/exceptions/',
        __DIR__.'/src/interfaces/',
        __DIR__.'/src/services/',
        __DIR__.'/src/core/',
        __DIR__.'/src/'
    );

    $paths = [];

    foreach ($classesDir as $directory) {
        $files = glob($directory . "*.php");
        foreach($files as $file){
            $paths[] = $file;
            include $file;
        }
    }
}