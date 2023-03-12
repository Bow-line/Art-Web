<?php


class Loging extends Database
{
    private $collection='logowanie';
    public function __construct() {
        parent::__construct();
        $this->dbHandler = $this->dbHandler->{$this->collection};
    }
}