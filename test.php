<?php
ini_set('memory_limit','250M');
ini_set('max_execution_time', 1200);
set_time_limit(1200);

require __DIR__ .'/JsonSorter.php';

try 
{
    $dataFiles = [
        'small' => __DIR__ . '/data/junk-data.json',
        'full' => __DIR__ . '/data/junk-data-full.json',
    ];
    $sort = new JsonSorter($dataFiles['small']);
    $sort->sort();
    $sort->renderItems();
    // full
    $sort = new JsonSorter($dataFiles['full']);
    $sort->sort();
    $sort->renderItems();
} 
  catch(\Exception $e)
{
    throw $e;
}
