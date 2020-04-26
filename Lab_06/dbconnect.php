<?php
require_once __DIR__ . "/vendor/autoload.php";

$DB = new MongoDB\Client(
    "mongodb://127.0.0.1:27017",
    [],
    [
        'typeMap' => [
            'root' => 'array',
            'document' => 'array',
            'array' => 'array',
        ],
    ]
);

$DB = $DB->Lab_06;