<?php

require ROOT_PATH . '/vendor/autoload.php';

// Using Medoo namespace
use Medoo\Medoo;

// Validate Host
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    // Initialize
    $db = new Medoo([
        'database_type' => 'mysql',
        'database_name' => DB,
        'server' => SERVER,
        'username' => USER,
        'password' => PASSWORD
    ]);
} else {
    // Initialize
    $db = new Medoo([
        'database_type' => 'mysql',
        'database_name' => DB,
        'server' => SERVER,
        'username' => USER,
        'password' => PASSWORD
    ]);
}
