<?php
require_once __DIR__ . '/../config/DBConfig.php';
require 'connect.php';

$command = $argv[1] ?? null;

$migrations = [
    'product_migration' => 'ProductMigration',
];

foreach ($migrations as $filename => $classname) {
    require "migrations/{$filename}.php";
    $migration = new $classname();

    if ($command === 'migrate') {
        $migration->up();
        echo "Migrated: {$classname}\n";
    } elseif ($command === 'rollback') {
        $migration->down();
        echo "Rolled back: {$classname}\n";
    }
}