<?php
require __DIR__ . '/SortInterface.php';
require __DIR__ .'/vendor/autoload.php';

use MongoDB\Client;
use JsonMachine\JsonMachine;

class JsonSorter implements SortInterface
{
    protected $conn;
    protected $fileName;
    protected $tableName;
    protected $iterated;
    protected $items;
    protected $limit = 2000;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        $this->tableName = basename($fileName, ".json");
        $this->conn = new Client('mongodb://localhost:27017');
        $this->iterated = 0;
    }

    public function sort(): void
    {
        $duplicates = 0;
        $collection = $this->conn->sort->{$this->tableName};
        $jsonStream = JsonMachine::fromFile($this->fileName);
        $collection->createIndex(['guid'=>1], ['unique'=>true]);
        echo 'Processing '.$this->tableName.' data'.PHP_EOL;
        foreach ($jsonStream as $item) {
            try {
                $collection->insertOne( $item );
            } 
            catch (\Exception $e)
            {
                $duplicates++;
            }
            $this->iterated++;
        }
        if ($duplicates === $this->iterated) {
            print_r('All entries in file found on server'.PHP_EOL);
        } elseif($duplicates > 0) {
            print_r('Found '.$duplicates.' duplicated enteries on server, out of '.$this->iterated.' entries in file'.PHP_EOL);
        } else{
           print_r('All entries in file migrated to server'.PHP_EOL); 
        }
    }

    public function renderItems(): void {   
        for($i=0; $i <= $this->iterated; $i+=$this->limit){
            $filter = [];
            $options = ['sort' => ['registered' => 1], 'limit'=> $this->limit, 'skip'=> $i];
            $collection = $this->conn->sort->{$this->tableName};
            $this->items = $collection->find($filter,$options)->toArray();
            var_dump($this->items);
            /*
            foreach ($this->items as $item) {
                var_dump($item);
            }*/
        }
    }

    public function clearData():void
    {
        $collection = $this->conn->JsonSorter->{$this->tableName};
        $result = $collection->drop();
        var_dump($result);
    }
}
