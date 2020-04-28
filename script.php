<?php

ini_set('memory_limit','250M');
ini_set('max_execution_time', 1200);
set_time_limit(1200);

require __DIR__ . '/libs/JsonSorter/BrokenSorter.php';

$dataFiles = [
    'small' => __DIR__ . '/data/junk-data.json',
    'full' => __DIR__ . '/data/junk-data-full.json',
];

// Executes Fine
$sort = new JsonSorter($dataFiles['small']);
$sort->sort();
$sort->renderItems();

// Fails!
$sort = new JsonSorter($dataFiles['full']);
$sort->sort(); // <-- Used too much memory!
$sort->renderItems();
