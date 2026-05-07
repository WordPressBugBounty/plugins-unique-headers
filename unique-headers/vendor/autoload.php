<?php

spl_autoload_register(static function (string $class): void {
    $prefixes = [
        'RyanHellyer\\UniqueHeaders\\Vendor\\Psr\\Container\\' => __DIR__ . '/psr/container/src/',
        'RyanHellyer\\UniqueHeaders\\Vendor\\Inpsyde\\Modularity\\' => __DIR__ . '/inpsyde/modularity/src/',
        'RyanHellyer\\UniqueHeaders\\' => __DIR__ . '/../src/',
    ];
    foreach ($prefixes as $prefix => $baseDir) {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            continue;
        }
        $file = $baseDir . str_replace('\\', '/', substr($class, $len)) . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
});
