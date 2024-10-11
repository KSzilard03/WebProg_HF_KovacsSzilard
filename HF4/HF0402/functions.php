<?php

spl_autoload_register(function ($class) {
    $prefix = 'HF0402\\Modells\\';
    $base_dir = __DIR__ . '/Modells/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . $relative_class . '.php';

    if (file_exists($file)) {
        include $file;
    } else {
        throw new \Exception("Model $class does not exist");
    }
});

?>