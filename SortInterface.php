<?php

interface SortInterface
{
    /**
     * Accept a filename to read JSON data from
     *
     * @param $fileName
     */
    public function __construct($fileName);

    /**
     * Execute the sort
     */
    public function sort(): void;

    /**
     * Display each record in the console, in the correct order
     */
    public function renderItems(): void;
}
