<?php
require __DIR__ . '/SortInterface.php';
require __DIR__ . '/vendor/autoload.php';

use JsonMachine\JsonMachine;

class JsonSorter implements SortInterface
{
    protected $fileName;
    protected $itemsPerQuery = 10;
    protected $items;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function sort(): void
    {
        //$fileContents = file_get_contents($this->fileName);
        //$this->items = json_decode($fileContents, true);
        $jsonStream = \JsonMachine\JsonMachine::fromFile(__DIR__ . '/data/junk-data-full.json');

        usort($this->items, function($a, $b) {
            return $a['registered'] <=> $b['registered'];
        });
    }

    public function renderItems(): void
    {
        foreach($this->items as $item) {
            var_dump($item);
        }
    }
}
