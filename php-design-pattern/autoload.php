<?php

$classnames = function (string $classname) {
    $path = str_replace('_', DIRECTORY_SEPARATOR, $classname);
    $path = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';

    if (stream_resolve_include_path($path)) {
        require_once $path;
    }
};

$namespaces = function (string $path) {
    if (preg_match('/\\\\/', $path)) {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
        $path = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';

        if (stream_resolve_include_path($path)) {
            require_once $path;
        }
    }
};

spl_autoload_register($classnames);
spl_autoload_register($namespaces);
