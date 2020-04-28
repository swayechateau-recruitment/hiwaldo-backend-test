<?php
ini_set('memory_limit','250M');
ini_set('max_execution_time', 1200);
set_time_limit(1200);

require __DIR__ .'/vendor/autoload.php';

use MongoDB\Client;
use JsonMachine\JsonMachine;

$conn = new Client();
$dataFiles = [
    'small' => __DIR__ . '/data/junk-data.json',
    'full' => __DIR__ . '/data/junk-data-full.json',
];

try 
{

} 
  catch(\Exception $e)
{
    throw $e;
}



    function uploadFile ($efilename):void
    {
        $duplicates=0;
        $iterated=0;
        $collection=$this->conn->sort->{basename($filename, ".json")};
        $jsonStream=JsonMachine::fromFile($filename);
        print_r('Processing json data');
        foreach ($jsonStream as $item) {
            try {
                $collection->insertOne( $item );
            } 
            catch (\Exception $e)
            {
                $duplicates++;
            }
            $iterated++;
        }
        if ($duplicates === $iterated) {
            print_r('All entries in file found on server');
        } elseif($duplicates > 0) {
            print_r('Found '.$duplicates.' duplicated enteries on server, out of '.$iterated.' entries in file');
        }
        print_r('All entries in file migrated to server');

    }

    function renderItems($filename): void {
        $collection = $this->conn->sort->{basename($filename, ".json")};
        $this->items = $collection->find()->toArray();
        foreach ($results as $item) {
            print($item);
        }
    }